<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (!Schema::hasColumn('courses', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('name');
            }
        });
        // Backfill slugs for existing rows
        $courses = DB::table('courses')->select('id','name')->get();
        $used = [];
        foreach ($courses as $c) {
            $base = Str::slug($c->name) ?: 'course-'.$c->id;
            $slug = $base;
            $i = 1;
            while (in_array($slug, $used) || DB::table('courses')->where('slug', $slug)->exists()) {
                $slug = $base.'-'.$i++;
            }
            $used[] = $slug;
            DB::table('courses')->where('id', $c->id)->update(['slug' => $slug]);
        }
        Schema::table('courses', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (Schema::hasColumn('courses', 'slug')) {
                $table->dropUnique(['slug']);
                $table->dropColumn('slug');
            }
        });
    }
};
