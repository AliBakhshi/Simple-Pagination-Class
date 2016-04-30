<?php

class Pagination
{
    public $count = 6; // Number Of Posts Per Page
    public $url = 'www.domain.com?action=news&page=';  // Address Of All Posts With $_GET['page'] 
    public $total = 0; // Number Of Total Posts (SELECT COUNT(*) AS count FROM posts)

    // define current page number
    private function define_page()
    {
        isset($_GET['y']) && !empty($_GET['page']) && is_numeric($_GET['page']) ? $page = (int)$_GET['page'] : $page = 1;
        return $page;
    }

    // get max page number 
    private function limit_page()
    {
        $page = $this->define_page();
        $start = $page * $this->count - $this->count;
        $fullnumber = $this->total;
        $total = $fullnumber['count'] / $this->count;
        is_float($total) ? $max = $total + 2 : $max = $total + 1;
        $array = array('start'=>(int)$start,'max'=>(int)$max);
        return $array;
    }

    // view html code 
    
    public function view()
    {
        $page = $this->define_page();
        $limit = $this->limit_page();
        if($limit['max'] < 6)
        {
            $max=$limit['max'];
            $min=0;
        }else
        {
            $page+4 > $limit['max'] ? $max=$limit['max'] : $max=$page+4;
            $page-4 > 0 ? $min=$page-4 : $min=0;
        }
        print '<ul class="pagination">';
        $next=$page+1;
        $prev=$page-1;
        if($page!=1){echo'<li><a href="'.$this->url.$prev.'">Prev</a></li>';}
        for($i=$min+1;$i<$max;$i++)
        {
            if($page == $i)
            {
                echo '<li class="active"><a href="#">'.$i.'</a></li>';
            }else
            {
                echo '<li><a href="'.$this->url.$i.'">'.$i.'</a></li>';
            }
        }
        $last = $limit['max']-1;
        if($page!=$last && $page<$limit['max']){print '<li><a href="'.$this->url.$next.'">Next</a></li>';}
        print '</ul>';
    }

}
