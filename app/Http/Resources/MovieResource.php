<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if(isset($this->route_url)) {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'summary' => $this->summary,
                'cover_image' => image_path($this->cover_image, null),
                'user_name' => $this->user->name,
                'genre_name' => $this->genre->name,
                'author_name' => $this->author->name,
    
            ];
            
        } else {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'summary' => $this->summary,
                'cover_image' => image_path($this->cover_image, null),
                'user_name' => $this->user->name,
                'genre_name' => $this->genre->name,
                'author_name' => $this->author->name,
                'tags' => $this->getTagsName(),
                'comments' => $this->getComments(),
                'related_movies' => $this->relatedMovies(),
    
            ];
        }
       
    }
}
