/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
   // Define changes to default configuration here. For example:
   // config.language = 'fr';
   // config.uiColor = '#AADC6E';
   
	config.entities = true;
	config.forcePasteAsPlainText = true;

	config.toolbar = 'Full';
	config.filebrowserUploadUrl = '/ckeditor/uploader/upload.php';
	config.extraPlugins = 'MediaEmbed';
	config.toolbar_Full =
	[
	    ['Cut','Copy','Paste','PasteText','PasteFromWord'],
	    ['Undo','Redo','-','RemoveFormat'],
	    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	    ['NumberedList','BulletedList','-'],
	    ['Link','Unlink'],
	    ['Image','MediaEmbed','Table','SpecialChar'],
	    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	    ['Format','Source']
	];
	
	/*
	config.toolbar_Full =
	[
	    ['Source','-','Save'],
	    ['Cut','Copy','Paste','PasteText','PasteFromWord'],
	    ['Undo','Redo','-','RemoveFormat'],
	    '/',
	    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	    ['NumberedList','BulletedList','-'],
	    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	    ['Link','Unlink'],
	    ['Image','Flash','Table','SpecialChar'],
	    ['Format']
	];*/
};

