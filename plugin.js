( function() {
    tinymce.PluginManager.add( 'wp_test', function( editor, url ) {

        // Add a button that opens a window
        editor.addButton( 'wp_test_button_key', {

            text: 'WP DEV',
            icon: false,
            onclick: function() {
                // Open window
                editor.windowManager.open( {
                    title: 'Get Screenshort',
                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'url',
                                            label: 'Web url',
                                            value: 'http://www.wp-devleoper.net/'
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'width',
                                            label: 'Image width',
                                            value: '500',
                                           
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'height',
                                            label: 'Image width',
                                            value: '400',
                                           
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'alt',
                                            label: 'alt',
                                            value: 'Aijaz an exprience Wordpress Developer',
                                            
                                        }
                                    ],

                    onsubmit: function( e ) {
                        // Insert content when the window form is submitted
                      editor.insertContent( '[web-screenshort url="' + e.data.url + '" width="' + e.data.width + '" height="' + e.data.height + '" alt="' + e.data.alt + '"]');
                    }

                } );
            }

        } );

    } );

} )();