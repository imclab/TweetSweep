<?php

/**
* 
*/
class TweetSweep
{
	
	function __construct()
	{
		$this->hashtagStruct = array();
		$this->userMentionStruct = array();
	}

	function addHashtag($hashtag)
	{
		//see if hashtag exists in the struct
		if (array_key_exists($hashtag, $this->hashtagStruct)) 
		{
			//if it does, then append its count
			$this->hashtagStruct[$hashtag]['count'] = $this->hashtagStruct[$hashtag]['count'] + 1;
		}
		else
		{
			//if it doesn't, then make a new instance of hashtag in struct and set its count to 1
			$this->hashtagStruct = array_merge($this->hashtagStruct, array(
				$hashtag => array('text' => $hashtag, 'count' => 1)
			));
		}
	}

	function addUserMention($user_mention)
	{
		//see if user mention exists in the struct
		if (array_key_exists($user_mention, $this->userMentionStruct)) 
		{
			//if it does, then append its count
			$this->userMentionStruct[$user_mention]['count'] = $this->userMentionStruct[$user_mention]['count'] + 1;
		}
		else
		{
			//if it doesn't, then make a new instance of user mention in struct and set its count to 1
			$this->userMentionStruct = array_merge($this->userMentionStruct, array(
				$user_mention => array('screen_name' => $user_mention, 'count' => 1)
			));
		}
	}
	function sortByCount($a, $b) {
    	return $b['count'] - $a['count'];
	}

	function sortHashtags()
	{
		usort($this->hashtagStruct, array($this, 'sortByCount'));
	}

	function sortUserMentions()
	{
		usort($this->userMentionStruct, array($this, 'sortByCount'));
	}

	function popHashtag(){
		return array_pop($this->hashtagStruct);
	}

	




}

?>