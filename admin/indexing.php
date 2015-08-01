<!-- Function to get web page from a url. -->
<?php 

include('stopwords.php');
include('../includes/config.php');
    function strip_html_tags( $text ){

        $text = preg_replace(
            array(
              // Remove invisible content
                '@<head[^>]*?>.*?</head>@siu',
                '@<style[^>]*?>.*?</style>@siu',
                '@<script[^>]*?.*?</script>@siu',
                '@<object[^>]*?.*?</object>@siu',
                '@<embed[^>]*?.*?</embed>@siu',
                '@<applet[^>]*?.*?</applet>@siu',
                '@<noframes[^>]*?.*?</noframes>@siu',
                '@<noscript[^>]*?.*?</noscript>@siu',
                '@<noembed[^>]*?.*?</noembed>@siu',
              // Add line breaks before and after blocks
                '@</?((address)|(blockquote)|(center)|(del))@iu',
                '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
                '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
                '@</?((table)|(th)|(td)|(caption))@iu',
                '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
                '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
                '@</?((frameset)|(frame)|(iframe))@iu',
            ),
            array(
                ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
                "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
                "\n\$0", "\n\$0",
            ),
            $text );
        return strip_tags( $text );
    }

    /**
 * Strip punctuation from text.
 */
        function strip_punctuation( $text ){
        
        $urlbrackets    = '\[\]\(\)';
        $urlspacebefore = ':;\'_\*%@&?!' . $urlbrackets;
        $urlspaceafter  = '\.,:;\'\-_\*@&\/\\\\\?!#' . $urlbrackets;
        $urlall         = '\.,:;\'\-_\*%@&\/\\\\\?!#' . $urlbrackets;
     
        $specialquotes  = '\'"\*<>';
     
        $fullstop       = '\x{002E}\x{FE52}\x{FF0E}';
        $comma          = '\x{002C}\x{FE50}\x{FF0C}';
        $arabsep        = '\x{066B}\x{066C}';
        $numseparators  = $fullstop . $comma . $arabsep;
     
        $numbersign     = '\x{0023}\x{FE5F}\x{FF03}';
        $percent        = '\x{066A}\x{0025}\x{066A}\x{FE6A}\x{FF05}\x{2030}\x{2031}';
        $prime          = '\x{2032}\x{2033}\x{2034}\x{2057}';
        $nummodifiers   = $numbersign . $percent . $prime;
     
        return preg_replace(
            array(
            // Remove separator, control, formatting, surrogate,
            // open/close quotes.
                '/[\p{Z}\p{Cc}\p{Cf}\p{Cs}\p{Pi}\p{Pf}]/u',
            // Remove other punctuation except special cases
                '/\p{Po}(?<![' . $specialquotes .
                    $numseparators . $urlall . $nummodifiers . '])/u',
            // Remove non-URL open/close brackets, except URL brackets.
                '/[\p{Ps}\p{Pe}](?<![' . $urlbrackets . '])/u',
            // Remove special quotes, dashes, connectors, number
            // separators, and URL characters followed by a space
                '/[' . $specialquotes . $numseparators . $urlspaceafter .
                    '\p{Pd}\p{Pc}]+((?= )|$)/u',
            // Remove special quotes, connectors, and URL characters
            // preceded by a space
                '/((?<= )|^)[' . $specialquotes . $urlspacebefore . '\p{Pc}]+/u',
            // Remove dashes preceded by a space, but not followed by a number
                '/((?<= )|^)\p{Pd}+(?![\p{N}\p{Sc}])/u',
            // Remove consecutive spaces
                '/ +/',
            ),
            ' ',
            $text );
}
        /**
 * Strip symbols from text.
 */
        function strip_symbols( $text )
        {
            $plus   = '\+\x{FE62}\x{FF0B}\x{208A}\x{207A}';
            $minus  = '\x{2012}\x{208B}\x{207B}';
         
            $units  = '\\x{00B0}\x{2103}\x{2109}\\x{23CD}';
            $units .= '\\x{32CC}-\\x{32CE}';
            $units .= '\\x{3300}-\\x{3357}';
            $units .= '\\x{3371}-\\x{33DF}';
            $units .= '\\x{33FF}';
         
            $ideo   = '\\x{2E80}-\\x{2EF3}';
            $ideo  .= '\\x{2F00}-\\x{2FD5}';
            $ideo  .= '\\x{2FF0}-\\x{2FFB}';
            $ideo  .= '\\x{3037}-\\x{303F}';
            $ideo  .= '\\x{3190}-\\x{319F}';
            $ideo  .= '\\x{31C0}-\\x{31CF}';
            $ideo  .= '\\x{32C0}-\\x{32CB}';
            $ideo  .= '\\x{3358}-\\x{3370}';
            $ideo  .= '\\x{33E0}-\\x{33FE}';
            $ideo  .= '\\x{A490}-\\x{A4C6}';
         
            return preg_replace(
                array(
                // Remove modifier and private use symbols.
                    '/[\p{Sk}\p{Co}]/u',
                // Remove mathematics symbols except + - = ~ and fraction slash
                    '/\p{Sm}(?<![' . $plus . $minus . '=~\x{2044}])/u',
                // Remove + - if space before, no number or currency after
                    '/((?<= )|^)[' . $plus . $minus . ']+((?![\p{N}\p{Sc}])|$)/u',
                // Remove = if space before
                    '/((?<= )|^)=+/u',
                // Remove + - = ~ if space after
                    '/[' . $plus . $minus . '=~]+((?= )|$)/u',
                // Remove other symbols except units and ideograph parts
                    '/\p{So}(?<![' . $units . $ideo . '])/u',
                // Remove consecutive white space
                    '/ +/',
                ),
                ' ',
                $text );
        }

               /**
         * Strip numbers from text.
         */
        function strip_numbers( $text )
        {
            $urlchars      = '\.,:;\'=+\-_\*%@&\/\\\\?!#~\[\]\(\)';
            $notdelim      = '\p{L}\p{M}\p{N}\p{Pc}\p{Pd}' . $urlchars;
            $predelim      = '((?<=[^' . $notdelim . '])|^)';
            $postdelim     = '((?=[^'  . $notdelim . '])|$)';
         
            $fullstop      = '\x{002E}\x{FE52}\x{FF0E}';
            $comma         = '\x{002C}\x{FE50}\x{FF0C}';
            $arabsep       = '\x{066B}\x{066C}';
            $numseparators = $fullstop . $comma . $arabsep;
            $plus          = '\+\x{FE62}\x{FF0B}\x{208A}\x{207A}';
            $minus         = '\x{2212}\x{208B}\x{207B}\p{Pd}';
            $slash         = '[\/\x{2044}]';
            $colon         = ':\x{FE55}\x{FF1A}\x{2236}';
            $units         = '%\x{FF05}\x{FE64}\x{2030}\x{2031}';
            $units        .= '\x{00B0}\x{2103}\x{2109}\x{23CD}';
            $units        .= '\x{32CC}-\x{32CE}';
            $units        .= '\x{3300}-\x{3357}';
            $units        .= '\x{3371}-\x{33DF}';
            $units        .= '\x{33FF}';
            $percents      = '%\x{FE64}\x{FF05}\x{2030}\x{2031}';
            $ampm          = '([aApP][mM])';
         
            $digits        = '[\p{N}' . $numseparators . ']+';
            $sign          = '[' . $plus . $minus . ']?';
            $exponent      = '([eE]' . $sign . $digits . ')?';
            $prenum        = $sign . '[\p{Sc}#]?' . $sign;
            $postnum       = '([\p{Sc}' . $units . $percents . ']|' . $ampm . ')?';
            $number        = $prenum . $digits . $exponent . $postnum;
            $fraction      = $number . '(' . $slash . $number . ')?';
            $numpair       = $fraction . '([' . $minus . $colon . $fullstop . ']' .
                $fraction . ')*';
         
            return preg_replace(
                array(
                // Match delimited numbers
                    '/' . $predelim . $numpair . $postdelim . '/u',
                // Match consecutive white space
                    '/ +/u',
                ),
                ' ',
                $text );
        }    
                     
        
        $page_id = 26;        
        $query = $db->query("SELECT contents FROM page WHERE id =$page_id");
        $page_contents = $query->fetchAll(PDO::FETCH_ASSOC);
        

        foreach ($page_contents as $row) {
                
        $utf8_text = strip_html_tags( $row['contents']);
        $utf8_text = html_entity_decode( $utf8_text, ENT_QUOTES, "UTF-8" );
        $text = strip_punctuation( $utf8_text );
        $text = strip_symbols( $text );
        $text = strip_numbers( $text );
        $text = mb_strtolower( $text, "utf-8" );
        $words = explode(' ', $text);
     
        $keywordCounts = array_count_values( $words );
        arsort( $keywordCounts, SORT_NUMERIC );
        $uniqueKeywords = array_keys( $keywordCounts );
        $uniqueKeywords = preg_replace($needles, "", $uniqueKeywords); //Remove stop words
        // print_r($uniqueKeywords);

        for ($i=0; $i < count($uniqueKeywords) ; $i++) { 
            if ($uniqueKeywords[$i]!="") {
                $cur_word = addslashes(strtolower($uniqueKeywords[$i]));
                $query = $db->query("SELECT word_id FROM word WHERE word_word='$cur_word'");
                $row = $query->fetchAll();      
                
                if ($row[0]['word_id']) {
                    $word_id = $row[0]['word_id'];
                 }
                 else {
                    $query = $db->query("INSERT INTO word (word_word) VALUES ('$cur_word')");
                    $word_id = $db->lastInsertId(); 
                                  
            }
                 $db->query("INSERT INTO occurrence (word_id,page_id) VALUES ($word_id,$page_id)");
                
            } 
        }

}
    


?>