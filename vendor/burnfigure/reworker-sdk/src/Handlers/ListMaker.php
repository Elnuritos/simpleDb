<?php

namespace Reworker\Handlers;

use Reworker\Interfaces\LibraryInterface;
use Reworker\Library\Reworker;

class ListMaker
{

    private string $path;
    private ?string $full_path;

    private int $current_page;
    private int $per_page;

    private array $query;

    private array $list;

    public function __construct(private Reworker $reworker){

        $this->current_page = 1;
        $this->per_page = 250;
        $this->list = [];
    }

    public function getList(): array
    {
        $this->setFullPath();

        $result = $this->reworker->get($this->full_path);

        foreach($result['_embedded'][array_keys($result['_embedded'])[0]] as $item) {
            $this->list[] = $item;
        }

        if($this->current_page < $result['page_count']) {
            $this->current_page += 1;
            return $this->getList();
        }

        return $this->list;
    }

    private function setFullPath(): void
    {
        $this->full_path = "{$this->path}?page={$this->current_page}&per_page={$this->per_page}";

        if($this->query !== []){
            $this->full_path .= "&".http_build_query($this->query);
        }
    }

    public static function getEntityList(LibraryInterface $reworker, $query, $path): array
    {
        $list_maker = new self($reworker);
        $list_maker->path = $path;
        $list_maker->query = $query;
        return $list_maker->getList();
    }


    public function __set(string $name, $value): void
    {
        $this->$name = $value;
    }
}