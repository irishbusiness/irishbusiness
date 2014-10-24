<?php 
	class helpers{
		public function pre($str){
			echo "<pre>";
			print_r($str);
			echo "</pre>";
		}

		public function clean_str($str){
			$str = preg_replace('/(\v|\s)+/', ' ', $str);
			return  strip_tags( stripcslashes( trim($str) ) );
			return $str;
		}

		public function alert($str){
			echo "<script>alert('$str');</script>";
		}

		public function encode_str($str){
			// return html_entity_decode($str);
			return $str;
		}

		public function get_id($strGma, $channel){
			if( $channel == "gma" ){
				$posGma = strpos($strGma, 'story/');
				$strGma = substr($strGma, $posGma+6, strlen($strGma));
				$posGma1 = strpos($strGma, '/news');
				return substr($strGma, 0, $posGma1);
			} 
		}

		function generateRandomString($length) {
		    $characters = 'TheQuickBrownFoxJumpsOverTHeLazyDog1234567890';
		    $randomString = '';

		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, strlen($characters) - 1)];
		    }

		    return $randomString;
		}

		function generateRandomInt($length) {
		    $characters = '1234567890';
		    $randomString = '';

		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, strlen($characters) - 1)];
		    }

		    return $randomString;
		}

		function tryToXml($dom,$content) {
		    if(!$content) return false;

		    // xml well formed content can be loaded as xml node tree
		    $fragment = $dom->createDocumentFragment();
		    // wonderfull appendXML to add an XML string directly into the node tree!

		    // aappendxml will fail on a xml declaration so manually skip this when occurred
		    if( substr( $content,0, 5) == '<?xml' ) {
		      $content = substr($content,strpos($content,'>')+1);
		      if( strpos($content,'<') ) {
		        $content = substr($content,strpos($content,'<'));
		      }
		    }

		    // if appendXML is not working then use below htmlToXml() for nasty html correction
		    if(!@$fragment->appendXML( $content )) {
		      return $this->htmlToXml($dom,$content);
		    }

		    return $fragment;
		  }



		  // convert content into xml
		  // dom is only needed to prepare the xml which will be returned
		  function htmlToXml($dom, $content, $needEncoding=false, $bodyOnly=true) {

		    // no xml when html is empty
		    if(!$content) return false;

		    // real content and possibly it needs encoding
		    if( $needEncoding ) {
		      // no need to convert character encoding as loadHTML will respect the content-type (only)
		      $content =  '<meta http-equiv="Content-Type" content="text/html;charset='.$this->encoding.'">' . $content;
		    }

		    // return a dom from the content
		    $domInject = new DOMDocument("1.0", "UTF-8");
		    $domInject->preserveWhiteSpace = false;
		    $domInject->formatOutput = true;

		    // html type
		    try {
		      @$domInject->loadHTML( $content );
		    } catch(Exception $e){
		      // do nothing and continue as it's normal that warnings will occur on nasty HTML content
		    }
		        // to check encoding: echo $dom->encoding
		        $this->reworkDom( $domInject );

		    if( $bodyOnly ) {
		      $fragment = $dom->createDocumentFragment();

		      // retrieve nodes within /html/body
		      foreach( $domInject->documentElement->childNodes as $elementLevel1 ) {
		       if( $elementLevel1->nodeName == 'body' and $elementLevel1->nodeType == XML_ELEMENT_NODE ) {
		         foreach( $elementLevel1->childNodes as $elementInject ) {
		           $fragment->insertBefore( $dom->importNode($elementInject, true) );
		         }
		        }
		      }
		    } else {
		      $fragment = $dom->importNode($domInject->documentElement, true);
		    }

		    return $fragment;
		  }



		    protected function reworkDom( $node, $level = 0 ) {

		        // start with the first child node to iterate
		        $nodeChild = $node->firstChild;

		        while ( $nodeChild )  {
		            $nodeNextChild = $nodeChild->nextSibling;

		            switch ( $nodeChild->nodeType ) {
		                case XML_ELEMENT_NODE:
		                    // iterate through children element nodes
		                    $this->reworkDom( $nodeChild, $level + 1);
		                    break;
		                case XML_TEXT_NODE:
		                case XML_CDATA_SECTION_NODE:
		                    // do nothing with text, cdata
		                    break;
		                case XML_COMMENT_NODE:
		                    // ensure comments to remove - sign also follows the w3c guideline
		                    $nodeChild->nodeValue = str_replace("-","_",$nodeChild->nodeValue);
		                    break;
		                case XML_DOCUMENT_TYPE_NODE:  // 10: needs to be removed
		                case XML_PI_NODE: // 7: remove PI
		                    $node->removeChild( $nodeChild );
		                    $nodeChild = null; // make null to test later
		                    break;
		                case XML_DOCUMENT_NODE:
		                    // should not appear as it's always the root, just to be complete
		                    // however generate exception!
		                case XML_HTML_DOCUMENT_NODE:
		                    // should not appear as it's always the root, just to be complete
		                    // however generate exception!
		                default:
		                    throw new exception("Engine: reworkDom type not declared [".$nodeChild->nodeType. "]");
		            }
		            $nodeChild = $nodeNextChild;
		        } ;
		    }
	}
?>