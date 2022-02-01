<?php

namespace App\Exports;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Contracts\Dao\post\PostDaoInterface;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostsExport implements FromCollection,  WithHeadings, WithEvents, WithMapping
{
    public $postInterface;
    public function __construct(PostDaoInterface $postDaoInterfae)
    {
        $this->postInterface = $postDaoInterfae;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->postInterface->exportPostList();
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings() :array
    {
        return [
            'Post name',
            'Details',
            'Category Names',
            'Posted Uploaded Users',
            'Created_at',
            'Updated_at',
        ];
    }
  
    public function map($post) : array {
        return [
            $post->post_name,
            $post->detail,
            $post->Category->name,
            $post->User->user_name,
            $post->created_at,
            $post->updated_at,
        ] ;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->freezePane('A2');
   
            },
        ];
    }
}
