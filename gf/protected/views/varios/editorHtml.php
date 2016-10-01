<script type="text/javascript" src="aloha/aloha.js"></script>
<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.Format/plugin.js"></script>
<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.Table/plugin.js"></script>
<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.List/plugin.js"></script>
<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.Link/plugin.js"></script>


<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.Paste/plugin.js"></script>
<script type="text/javascript" src="aloha/plugins/com.gentics.aloha.plugins.Paste/wordpastehandler.js"></script>


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
<script type="text/javascript">
function ClickHereToPrint(){
    try{ 
        var oIframe = document.getElementById('ifrmPrint');
        var oContent = document.getElementById('content').innerHTML;
        var oDoc = (oIframe.contentWindow || oIframe.contentDocument);
        if (oDoc.document) oDoc = oDoc.document;
		oDoc.write("<html><head><title>title</title>");
		oDoc.write("<link rel='stylesheet' type='text/css' href='<?php echo Yii::app()->request->baseUrl; ?>/css/AlohaDocument.css' />");
		oDoc.write("</head><body onload='this.focus(); this.print();'>");
		oDoc.write(oContent + "</body></html>");	    
		oDoc.close(); 	 
		//history.go(-2) ;  
    }
    catch(e){
	    self.print();
    }
}
</script>
<iframe id='ifrmPrint' src='#' style="width:0px; height:0px;"></iframe>


	<div id="content" class="article">
<?php echo $campo ?>
	</div>


</div>
<div id="pie">
<?php echo CHtml::link(CHtml::image('images/iconos/famfam/arrow_left.png','Terminar',array('onclick'=>'history.go(-2)','align'=>'left')),'#'); ?>
<?php echo CHtml::link(CHtml::image('images/iconos/famfam/printer.png','Terminar',array('onclick'=>'ClickHereToPrint()')),
                    '#'); ?>
                    <?php echo CHtml::link(CHtml::image('images/iconos/famfam/page_excel.png','Terminar',array('onclick'=>'')),
                    '#'); ?>
                    <?php echo CHtml::link(CHtml::image('images/iconos/famfam/page_white_acrobat.png','Terminar',array('onclick'=>'')),
                    '#'); ?>
</div>
