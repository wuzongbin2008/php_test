<?
/**************************************/
/*		@ Pager						  */
/*		@ 							  */
/*		@ Designer AnVy				  */
/**************************************/
class listPage
{
	//public
	var $firstPage;
	var $endPage;
	var $lastPage;
	var $nextPage;
	var $thisPage;
	var $pageSize;
	var $rowNum;
	var $listNum;
	var $cssClass;
	var $splitStr;
	
	var $pageLast;
	var $pageNext;
	var $pageFirst;
	var $pageEnd;
	var $pageList;
	var $pageSelect;
	var $pageAll;
	
	var $links;
	
	function listPage($rowNum,$pageSize = '10',$listNum = '8')
	{
		$this->rowNum = $rowNum;
		$this->pageSize = $pageSize;
		$this->listNum = $listNum;
		$this->splitStr = '&nbsp;';
		$this->lastPage = 'LastPage';
		$this->nextPage = 'NextPage';
		$this->firstPage = 'FirstPage';
		$this->endPage = 'EndPage';
		$this->thisPage = $_GET['page'] ? $_GET['page'] : 1;
	}
	
	function getStrWhere()
	{
		$temp = array();
		foreach ($_GET as $key=>$val)
		{
			if($key != 'page') $temp[] = urlencode($key).'='.urlencode($val);
		}
		foreach ($_POST as $key=>$val)
		{
			$temp[] = urlencode($key).'='.urlencode($val);
		}
		$str = @ join('&',$temp);
		unset($temp);
		return $str;
	}
	
	function getPageNum()
	{
		if ($this->thisPage < 1)
		{
			$this->thisPage = 1;
		}
		if ($this->rowNum < 1)
		{
			return 1;
		}
		return ceil($this->rowNum/$this->pageSize);
	}
	
	function createSelect($s,$e)
	{
		$temp = array();
		$temp[] = '<select class="'.$this->cssClass.'" onchange="window.location=this.options[this.selectedIndex].value">';
		for($i = $s ; $i <= $e;$i ++)
		{
			$temp[] = '<option value="?page='.$i.'&'.$this->getStrWhere().'" '.(($i == $this->thisPage)?'selected':'').'>'.$i;
		}
		$temp[] = '<select>';
		return join(chr(13),$temp);		
	}
	
	function createPage()
	{
		$strWhere = $this->getStrWhere();
		$lastPage = $this->lastPage;
		$firstPage = $this->firstPage;
		$endPage = $this->endPage;
		$nextPage = $this->nextPage;
		$thisPage = $this->thisPage;
		$pageNum = $this->getPageNum();
		$listNum = $this->listNum;
//		$stepNum = ceil($pageNum/$listNum);
		
		//$startNum = ($stepNum - 1)*$listNum + 1;
		$startNum = $thisPage - (ceil($listNum/2)-1);
		if ($startNum < 1 ) $startNum = 1;
		$endNum = $startNum + $listNum - 1;
		if ($endNum > $pageNum) $endNum = $pageNum;
		
//		$tmpNum = ceil($thisPage/$listNum);
//		$startNum = ($tmpNum-1)*$listNum;
//		if ($startNum < 1 ) $startNum = 1;
//		$endNum = $tmpNum * $listNum;
//		if ($endNum > $pageNum) $endNum = $pageNum;
		
		
		$this->links['first'] ='?'.$strWhere.'&page=1';
		$this->links['last'] ='?'.$strWhere.'&page='.(($thisPage-1<1)?1:($thisPage-1));
		$this->links['next'] ='?'.$strWhere.'&page='.(($thisPage+1>$pageNum)?$pageNum:($thisPage+1));
		$this->links['end'] ='?'.$strWhere.'&page='.$pageNum;
		$this->pageFirst = '<a href="'.$this->links['first'].'">'.$firstPage.'</a>'.$this->splitStr;
		$this->pageLast = '<a href="'.$this->links['last'].'">'.$lastPage.'</a>';
		$this->pageNext = '<a href="'.$this->links['next'].'">'.$nextPage.'</a>';
		$this->pageEnd = $this->splitStr.'<a href="'.$this->links['end'].'">'.$endPage.'</a>';
		
		$pageList;
		
		for($i = $startNum ; $i <= $endNum ; $i ++)
		{
			if ($thisPage != $i)
			{
				$pageList[] = '<a href="?'.$strWhere.'&page='.$i.'" class="'.$this->cssClass.'">'.$i.'</a>';
			}else
			{
				$pageList[] = '<a class="'.$this->cssClass.'"><b>'.$i.'</b></a>';
			}
		}
		$this->pageList = @ join($this->splitStr,$pageList);
		$this->pageSelect = $this->createSelect($startNum,$endNum);
		$this->pageAll = $this->pageFirst.' '.$this->pageLast.' '.$this->pageList.' '.$this->pageNext.' '.$this->pageEnd;			
	}
}


//$obj = new listPage(22222222);
//$obj->createPage();
//echo $obj->pageAll;

?>