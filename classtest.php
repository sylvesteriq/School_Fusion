<?php

    $alphabet = ['nil','a','b','c','d','e','f','g','h','i','j','k','l'
                ,'m','n','o','p','q','r','s','t','u','v','w','x','y','z'] ;
                
            echo $count = array_search("z", $alphabet);
            echo "<br>";
            
            $g = ["zoo","just"];
            $alphabet = array_merge($alphabet,$g);
            echo $count = array_search("zoo", $alphabet);
            
            
            list($classes,$classes2) = getClasses("a", "g", "js1");
            foreach ($classes as $value){
                echo $value."<br>";
            }
            
            foreach ($classes2['js1'] as $value){
                echo $value."<br>";
            }
            $sss[key($classes2)] = $classes2; 
            list($classes,$classes2) = getClasses("a", "z", "js2");
            
            
            
            function getClasses($first,$last,$level){
              $alphabet = ['nil','a','b','c','d','e','f','g','h','i','j','k','l'
                ,'m','n','o','p','q','r','s','t','u','v','w','x','y','z'] ;
                
              $key_1 = array_search($first, $alphabet);
              $key_2 = array_search($last, $alphabet);
              
              if($key_1 != 0){
                for($i = $key_1 ; $i <= $key_2 ; $i++){
                  $classes[] = $level.$alphabet[$i];
                  $classes2[$level][] = $alphabet[$i];
              }
              return array($classes,$classes2);
              }
        }
?>
