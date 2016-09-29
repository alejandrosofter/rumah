<script type="text/javascript" src="aloha/aloha.js"></script>
<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.Format/plugin.js"></script>
<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.Table/plugin.js"></script>
<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.List/plugin.js"></script>
<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.Link/plugin.js"></script>


<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.Paste/plugin.js"></script>
<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.Paste/wordpastehandler.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/AlohaDocument.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tablasImpresion.css" />
<link rel="stylesheet" type="text/css" media="print" href="<?php echo Yii::app()->request->baseUrl; ?>/css/impresion.css" />


<script type="text/javascript">
GENTICS.Aloha.settings = {
	logLevels: {'error': true, 'warn': true, 'info': true, 'debug': false},
	errorhandling : false,
	ribbon: false,	


	"plugins": {
	 	"com.gentics.aloha.plugins.Format": {
		 	// all elements with no specific configuration get this configuration
			config : [ 'b', 'i','sub','sup'],
		  	editables : {
				// no formatting allowed for title
				'#title'	: [ ], 
				// formatting for all editable DIVs
				'div'		: [ 'b', 'i', 'del', 'sub', 'sup'  ], 
				// content is a DIV and has class .article so it gets both buttons
				'.article'	: [ 'b', 'i', 'p', 'title', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'pre', 'removeFormat']
		  	}
		},
	 	"com.gentics.aloha.plugins.List": { 
		 	// all elements with no specific configuration get an UL, just for fun :)
			config : [ 'ul' ],
		  	editables : {
				// Even if this is configured it is not set because OL and UL are not allowed in H1.
				'#title'	: [ 'ol' ], 
				// all divs get OL
				'div'		: [ 'ol' ], 
				// content is a DIV. It would get only OL but with class .article it also gets UL.
				'.article'	: [ 'ul' ]
		  	}
		},
	 	"com.gentics.aloha.plugins.Link": {
		 	// all elements with no specific configuration may insert links
			config : [ 'a' ],
		  	editables : {
				// No links in the title.
				'#title'	: [  ]
		  	},
		  	// all links that match the targetregex will get set the target
 			// e.g. ^(?!.*aloha-editor.com).* matches all href except aloha-editor.com
		  	targetregex : '^(?!.*aloha-editor.com).*',
		  	// this target is set when either targetregex matches or not set
		    // e.g. _blank opens all links in new window
		  	target : '_blank',
		  	// the same for css class as for target
		  	cssclassregex : '^(?!.*aloha-editor.com).*',
		  	cssclass : 'aloha',
		  	// use all resources of type website for autosuggest
		  	objectTypeFilter: ['website'],
		  	// handle change of href
		  	onHrefChange: function( obj, href, item ) {
			  	if ( item ) {
					jQuery(obj).attr('data-name', item.name);
			  	} else {
					jQuery(obj).removeAttr('data-name');
			  	}
		  	}
		},
	 	"com.gentics.aloha.plugins.Table": { 
		 	// all elements with no specific configuration are not allowed to insert tables
			config : [ ],
		  	editables : {
				// Allow insert tables only into .article
				'.article'	: [ 'table' ] 
		  	}
		}
  	}
};

$(document).ready(function() {

	$('#content').aloha();	
});
</script>

<iframe id='ifrmPrint' src='#' style="width:0px; height:0px;"></iframe>
<div id="pie">
<?php 
$te='poo';
$texto="<applet id='appletJava' code=ImprimirPregunta.java width='0' height='0' archive='scripts/Prueba2_2.jar'>
                    
      
      
</applet>";
echo $texto;
echo CHtml::link(CHtml::image('images/iconos/famfam/printer.png','Terminar',array('onclick'=>"pulsado()")),
                    '#'); ?>
                   
</div>
<script>
         function pulsado()
         {
            var applet = document.getElementById("appletJava");
            var cont=document.getElementById("content");
            var texto=(cont.innerHTML);
            texto=texto.replace("'", '"');
            applet.print(texto,true,"impre","url",1,false,210,290,0,0);
         }
      </script>
<div id="main"> 
	<div id="bodyContent">
	<div id="content" class="article">
<?php echo $model->textoImpresion ?>
	</div>
</div>

</div>
<div id="pie">

<?php echo CHtml::link(CHtml::image('images/iconos/famfam/printer.png','Terminar',array('onclick'=>'window.print()')),
                    '#'); ?>
                  
</div>
