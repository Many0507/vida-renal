<?php
namespace App\Helpers;

class PaginationHelper {
    public $n_per_page = 10;
    public $page;
    public $total_rows;
    public $total_pages;
    public $offset;
    public $prev;
    public $next;

    public function __construct($page, $total_rows) {
        $this->page = $page;
        if (!$this->page) $this->page = 1;
    
        $this->total_rows = $total_rows;

        $this->total_pages = ceil($this->total_rows / $this->n_per_page);
    
        if ($this->page > $this->total_pages || $this->page <= 0) $this->page = 1;
    
        $this->offset = ($this->page - 1) * $this->n_per_page;

        $this->prev = $this->page - 1;
        $this->next = $this->page + 1;
    }
}