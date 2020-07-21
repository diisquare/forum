<?php
    function human_fileSize($bytes, $decimals = 2)
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
    }

/**
 * @param $lengthOfFakeString
 * @param $numOfReplies
 * @return string
 * @example 3;4;6;24
 */
    function getFakeRepliesId($lengthOfFakeString,$numOfReplies){
        $replies = "";
        $numbers = range(1,$numOfReplies);
        shuffle($numbers);
        for ($i=0;$i<$lengthOfFakeString;$i++){
            $replies= $replies."$numbers[$i]".';';
        }
        return $replies;
    }

