<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('admin.projects.index', ["projects" => $projects]);
    }

    public function show($slug) {
        $project = Project::where("slug", $slug)->firstOrFail();

        return view('admin.projects.show', ["project" => $project]);
    }

    public function create() {
        $types = Type::all();

        return view('admin.projects.create', ["types" => $types]);
    }

    public function store(ProjectStoreRequest $request) {
        $data = $request->validated();

        $data["slug"] = $this->generateSlug($data["title"]);

        $data['finished'] = intval($data['finished']);

        $data['imageURL'] = Storage::put("images", $data["imageURL"]);

        $project = Project::create($data);

        return redirect()->route('admin.projects.index');
    }

    public function edit($slug) {
        $project = Project::where("slug", $slug)->first();
        $types = Type::all();

        return view('admin.projects.edit', ["project" => $project, "types" => $types]);
    }

    public function update(ProjectUpdateRequest $request, $slug) {
        $data = $request->validated();

        $project = Project::where("slug", $slug)->first();

        if($data['title'] !== $project['title']) {
            $data['slug'] = $this->generateSlug($data['title']);
        }

        $data['finished'] = intval($data['finished']);

        if(isset($data["imageURL"])) {
            if($project->imageURL) {
                Storage::delete($project->imageURL);
            }

            $image_path = Storage::put("images", $data["imageURL"]);
            $data["imageURL"] = $image_path;
        }

        $project->update($data);

        return redirect()->route('admin.projects.show', $project->slug);
    }

    public function destroy($slug) {
        $project = Project::where("slug", $slug)->first();

        if($project->imageURL) {
            Storage::delete($project->imageURL);
        }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    protected function generateSlug($title) {
        $counter = 0;

        do {
            $slug = str::slug($title . ($counter > 0 ? "-" . $counter : ""));

            $alreadyexist = Project::where("slug", $slug)->first();

            $counter++;
        }while($alreadyexist);

        return $slug;
    }
}
