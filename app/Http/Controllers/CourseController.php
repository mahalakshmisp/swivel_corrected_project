<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;
use App\Models\VideoPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::with('videos')->findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function showBySlug($slug)
    {
        $course = Course::with('videos')->where('slug', $slug)->firstOrFail();
        return view('courses.show', compact('course'));
    }

    public function uploadForm($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.upload', compact('course'));
    }

    public function uploadVideos(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        // Accept empty slots; validate constraints per provided file
        $request->validate([
            'videos' => 'array',
            'videos.*.file' => 'nullable|file|mimes:mp4,mov,avi|max:51200',
            'videos.*.title' => 'nullable|string|max:255',
            'videos.*.price' => 'nullable|numeric|min:0',
        ]);

        $uploaded = 0;
        if (is_array($request->videos)) {
            foreach ($request->videos as $videoData) {
                if (!isset($videoData['file']) || !($videoData['file'] instanceof \Illuminate\Http\UploadedFile)) {
                    continue; // skip empty slot
                }
                // Ensure required fields for provided file
                if (empty($videoData['title']) || !isset($videoData['price'])) {
                    return back()->with('error', 'Title and price are required for each selected video.')->withInput();
                }
                $folder = Str::slug($course->name).'/video';
                $original = $videoData['file']->getClientOriginalName();
                $filename = time().'_'.Str::random(6).'_'.Str::slug(pathinfo($original, PATHINFO_FILENAME)).'.'.$videoData['file']->getClientOriginalExtension();
                $storedPath = Storage::disk('public')->putFileAs($folder, $videoData['file'], $filename);

                Video::create([
                    'title' => $videoData['title'],
                    'file_path' => $storedPath, // relative to public disk
                    'price' => $videoData['price'],
                    'course_id' => $course->id,
                ]);
                $uploaded++;
            }
        }

        if ($uploaded === 0) {
            return back()->with('error', 'Please select at least one video to upload.');
        }

        return redirect()->route('courses.show', $course->id)->with('success', 'Videos uploaded successfully!');
    }

    public function generalUploadForm()
    {
        $courses = Course::all();
        return view('courses.general_upload', compact('courses'));
    }

    public function generalUploadVideos(Request $request)
    {
        // Accept empty slots; validate constraints per provided file
        $request->validate([
            'videos' => 'array',
            'videos.*.file' => 'nullable|file|mimes:mp4,mov,avi|max:51200',
            'videos.*.title' => 'nullable|string|max:255',
            'videos.*.price' => 'nullable|numeric|min:0',
            'videos.*.course_id' => 'nullable|exists:courses,id',
        ]);

        $uploaded = 0;
        if (is_array($request->videos)) {
            foreach ($request->videos as $videoData) {
                if (!isset($videoData['file']) || !($videoData['file'] instanceof \Illuminate\Http\UploadedFile)) {
                    continue; // skip empty slot
                }
                if (empty($videoData['title']) || !isset($videoData['price']) || empty($videoData['course_id'])) {
                    return back()->with('error', 'Course, title and price are required for each selected video.')->withInput();
                }
                $course = Course::find($videoData['course_id']);
                if (!$course) {
                    return back()->with('error', 'Selected course not found.')->withInput();
                }

                $folder = Str::slug($course->name).'/video';
                $original = $videoData['file']->getClientOriginalName();
                $filename = time().'_'.Str::random(6).'_'.Str::slug(pathinfo($original, PATHINFO_FILENAME)).'.'.$videoData['file']->getClientOriginalExtension();
                $storedPath = Storage::disk('public')->putFileAs($folder, $videoData['file'], $filename);

                Video::create([
                    'title' => $videoData['title'],
                    'file_path' => $storedPath, // relative to public disk
                    'price' => $videoData['price'],
                    'course_id' => $course->id,
                ]);
                $uploaded++;
                $lastCourseId = $course->id;
            }
        }

        if ($uploaded === 0) {
            return redirect()->route('general.uploadForm')->with('error', 'Please select at least one video to upload.');
        }

        return redirect()->route('courses.show', $lastCourseId ?? $course->id)->with('success', 'Videos uploaded successfully!');
    }

    public function purchasePage(Video $video)
    {
        $course = $video->course;
        $purchased = Auth::check() && VideoPurchase::where('user_id', Auth::id())->where('video_id', $video->id)->exists();
        return view('courses.purchase', compact('video', 'course','purchased'));
    }

    public function storePurchase(Video $video)
    {
        // Auth is enforced by route middleware
        $course = $video->course;
        $userId = Auth::id();
        if (! $userId) {
            return redirect()->route('login');
        }
        VideoPurchase::firstOrCreate(
            ['user_id' => $userId, 'video_id' => $video->id],
            ['price' => $video->price]
        );
        return redirect()->route('courses.show', $course->slug)->with('success', 'Purchase successful!');
    }

    public function stream(Video $video)
    {
        $userId = Auth::id();
        $owned = VideoPurchase::where('user_id', $userId)->where('video_id', $video->id)->exists();
        if (! $owned) {
            abort(403, 'Unauthorized');
        }
        $disk = Storage::disk('public');
        if (! $disk->exists($video->file_path)) {
            abort(404);
        }
        $fullPath = $disk->path($video->file_path);
        $mime = 'video/mp4';

        $response = new StreamedResponse(function () use ($fullPath) {
            $stream = fopen($fullPath, 'rb');
            fpassthru($stream);
            fclose($stream);
        });
        $response->headers->set('Content-Type', $mime);
        $response->headers->set('Content-Disposition', 'inline; filename="'.basename($fullPath).'"');
        $response->headers->set('Accept-Ranges', 'bytes');
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, private');
        return $response;
    }
}