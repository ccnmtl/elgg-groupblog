<?php
	/**
	 * Elgg pages plugin language pack
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

        $catalan = array(
        
                /**
                 * Menu items and titles
                 */
                        
                        'groupblog' => "Notícies",
                        'groupblogs' => "Notícies",
                        'groupblog:user' => "Les notícies de %s",
                        'groupblog:your' => "Les notícies dels teus webs",
                        'groupblog:group' => "Les notícies dels webs de %s",
                        'groupblog:new' => "Nova notícia",
                        'groupblog:groupprofile' => "Notícies",
                        'groupblog:edit' => "Edita aquesta notícia",
                        'groupblog:delete' => "Esborra aquesta notícia",
                        'groupblog:history' => "Historial de notícies",
                        'groupblog:view' => "Veure les notícies",
                        

                        'groupblog:posttitle' => "Notícies de %s: %s",
                        'groupblog:everyone' => "Tots les notícies del portal",
        
                        'groupblog:read' => "Llegeix-la",
        
                        'groupblog:addpost' => "Escriu una notícia",
                        'groupblog:editpost' => "Edita una notícia",
        
                        'groupblog:text' => "Text de la notícia",
        
                        'groupblog:strapline' => "%s",
                        
                        'item:object:groupblog' => 'Notícies',
        
                        
         /**
             * Blog river
             **/
                
                //generic terms to use
                'groupblog:river:created' => "%s ha escrit",
                'groupblog:river:updated' => "%s ha actualitza",
                'groupblog:river:posted' => "%s publicat",
                
                //these get inserted into the river links to take the user to the entity
                'groupblog:river:create' => "una nova notícia.",
                'groupblog:river:update' => "una notícia.",
                'groupblog:river:annotate:create' => "un comentari en una notícia.",
                        
        
                /**
                 * Status messages
                 */
        
                        'groupblog:posted' => "Notícia publicada.",
                        'groupblog:deleted' => "Notícia esborrada.",
        
                /**
                 * Error messages
                 */
        
                        'groupblog:save:failure' => "La teva notícia no es pot desar. Si us plau, prova-ho més tard.",
                        'groupblog:blank' => "Ho sento; tens que omplir el títol i el cos del missatge per crear una notícia.",
                        'groupblog:notfound' => "Ho sento; la notícia especificat no es troba.",
                        'groupblog:notdeleted' => "Ho sento; no puc esborrar aquesta notícia.",
                        
        );
					
	add_translation("en",$catalan);
?>
