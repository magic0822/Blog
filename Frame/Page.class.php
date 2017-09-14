<?php
class Page {
    private $rowsPerPage;
    private $maxPages;
    private $rowCount;
    private $url;

    public function __construct($rowsPerpage, $rowCount, $maxPages, $url)
    {
        $this->initParams($rowsPerpage, $rowCount, $maxPages, $url);
    }

    public function initParams($rowsPerpage, $rowCount, $maxPages, $url)
    {
        $this->rowsPerPage = $rowsPerpage;
        $this->rowCount = $rowCount;
        $this->maxPages = $maxPages;
        $this->url = $url;
    }

    public function show()
    {
        $pages = ceil($this->rowCount / $this->rowsPerPage);
        $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
        $strPage = '';
        $strPage .= "<a href= '{$this->url}&pageNum = 1'>Home</a>&nbsp;";
        $preNum = $pageNum - 1;
        if($pageNum >1) {
            $strPage .= "<a href = '{$this->url}&pageNum=$preNum'><<上一页</a>&nbsp;";
        }
        if($pageNum <=3) {
            $startNum =1;
        } else {
            $startNum = $pageNum - 2;
        }

        if($startNum >= $pages - $this->maxPages +1) {
            $startNum = $pages - $this->maxPages +1;
        }

        if($startNum <1) {
            $startNum =1;
        }
        $endNum = $startNum + $this->maxPages -1;

        if($endNum >= $pages) {
            $endNum = $pages;
        }
        if($pages <=$this->maxPages) {
            $endNum = $pages;
        }
        for ($i=$startNum;$i<=$endNum;$i++) {
            if($i==$pageNum) {
                $strPage .= "<a href = '{$this->url}&pageNum=$i'><font color='red'>$i</font></a>&nbsp";
            } else {
                $strPage .="<a href = '{$this->url}&pageNum=$i'>$i</a>&nbsp";
            }
        }

        $nextNum = $pageNum + 1;
        if($pageNum < $pages) {
            $strPage .= "<a href = '{$this->url}&pageNum=$nextNum'>Next Page>></a>&nbsp";
        }
        $strPage .= "<a href = '{$this->url}&pageNum=$pages'>Last Page</a>&nbsp;";
        $strPage .= "Total pages：$pages";
        return $strPage;
    }
}