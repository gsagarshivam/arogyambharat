<?php
function getNthLevelChildNodes($conn,$level, $sponserID, $clubTable){
	// get id of sponser
	$row = mysqli_fetch_array(mysqli_query($conn,"SELECT `client_id` FROM ".$clubTable." WHERE client_id = '".$sponserID."'"));
	$sponser = $row['client_id'];
	$parentNodes = [$sponser];
	
	$childNodes = $parentNodes; // array to hold all child nodes at level n
	$tmpChildNodes = [];
	// sequence in which child rows will be processed is important, this array takes care of it
	$childNodeSequence =  [];
	$tmpLevel = 0;

	do{
		$tmpChildNodes = [];
		$rowData = getChildNodes($conn,$parentNodes,$clubTable);
        if($rowData){
		while($client = mysqli_fetch_array($rowData)){
			// this is required to maintain proper sequence in processing of child nodes 
			$childNodeSequence[$client['client_id']] = $client;
		}
        }
		//$rowData->free(); // array no longer needed, free memory
		foreach($childNodes as $parent){
			if($parent == 'E'){
				$tmpChildNodes[] = 'E'; // left empty child
				$tmpChildNodes[] = 'E'; // right empty child
				continue;
			}
			$node = $childNodeSequence[$parent];
			$tmpChildNodes[] = ($node['lft'] == 0)? "E" : $node['lft'];
			$tmpChildNodes[] = ($node['rgt'] == 0)? "E" : $node['rgt'];
		}
		$childNodes = $tmpChildNodes;
		$parentNodes = array_diff($tmpChildNodes, array("E"));

	}while(++$tmpLevel < $level);

	return $childNodes;
}





// return an array containing two keys
// parentID: id of node who is going to be parent of new DOMNode
// insertAt: where to insert, left or right
function getEmptyNode($conn,$sponserID,$clubTable){

	$nodeData = []; // this function returns this node with required details
	// get id of sponser
	$query = "SELECT `id` FROM ".$clubTable." WHERE user_id = '".$sponserID."'";
	$row = mysqli_fetch_array(mysqli_query($conn,$query));
	$sponser = $row['id'];
	$parentNodes = [$sponser];
	$childNodes = [];
	// sequence in which child rows will be processed is important, this array takes care of it
	$childNodeSequence =  [];

	while(true){
		$childNodes = [];
		$rowData = getChildNodes($conn,$parentNodes,$clubTable);

		while($client = mysqli_fetch_array($rowData)){
			// this is required to maintain proper sequence in processing of child nodes 
			$childNodeSequence[$client['id']] = $client;
		}
		//$rowData->free(); // array no longer needed, free memory
        unset($rowData); // remove if some prob. edited by me
		foreach($parentNodes as $parent){
			$node = $childNodeSequence[$parent];
			if($node['lft'] == 0){
				// left empty, insert here
				$nodeData["parentID"] = $parent;
				$nodeData["insertAt"] = 'lft';
				break;
			}
            else if($node['cnt'] == 0){
				// right empty, insert here
				$nodeData["parentID"] = $parent;
				$nodeData["insertAt"] = 'cnt';
				break;
			}
			else if($node['rgt'] == 0){
				// right empty, insert here
				$nodeData["parentID"] = $parent;
				$nodeData["insertAt"] = 'rgt';
				break;
			}
			else{
				$childNodes[] = $node['lft'];
                $childNodes[] = $node['cnt'];
				$childNodes[] = $node['rgt'];
			}
		}
		if(count($nodeData)) break; // break if we found insert point
		$parentNodes = $childNodes;
	}
	return $nodeData;
}

?>