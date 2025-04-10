<?php
namespace App\View\Components;

use Illuminate\View\Component;

class SearchResults extends Component
{
    public $results;
    public $query;

    /**
     * Create a new component instance.
     *
     * @param array $results
     * @param string $query
     */
    public function __construct($results, $query)
    {
        $this->results = $results;
        $this->query = $query;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.search-results');
    }
}
