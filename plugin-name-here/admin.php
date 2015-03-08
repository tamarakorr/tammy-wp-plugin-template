<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// TODO rename class
class todo_admin {
  
  function __construct() {
    add_action( 'admin_menu', array($this, 'add_admin_menu') );
    add_action( 'admin_init', array($this, 'settings_init') );
  }

  function add_admin_menu(  ) { 

    // TODO
    add_options_page( '[TODO Plugin Name Here]', '[TODO Plugin Name Here]',
      'manage_options', 'plugin_name_here', array($this, 'options_page') );

  }

  static function settings_get_defaults() {
      return array(
          'field_name_1' => 'Field 1 Default Property',
          'field_name_2' => 'Field 2 Default Property',
          'field_name_3' => '<br/><br/>Field 3 Default Property<br/><br/>',
          'field_name_4' => 'Field 4 Default Property<br/><br/>'
      );
  }

  function settings_init(  ) { 

    register_setting( 'TODOPluginPage', 'settings' );

    add_settings_section(
      'TODOPluginPage_section_1', 
      __( 'TODO Settings Section 1 Title', 'wordpress' ), 
      array($this, 'settings_section_1_callback'), 
      'TODOPluginPage'
    );

    add_settings_field( 
      'field_name_1', 
      __( 'TODO Field Name', 'wordpress' ), 
      array($this, 'field_name_1_render'), 
      'TODOPluginPage', 
      'TODOPluginPage_section_1' 
    );

    add_settings_field( 
      'field_name_2', 
      __( 'TODO Field Name', 'wordpress' ), 
      array($this, 'field_name_2_render'), 
      'TODOPluginPage', 
      'TODOPluginPage_section_1' 
    );

    add_settings_section(
      'TODOPluginPage_section_2', 
      __( 'TODO Section 2 Title', 'wordpress' ), 
      array($this, 'settings_section_2_callback'), 
      'TODOPluginPage'
    );

    add_settings_section(
      'TODOPluginPage_section_3', 
      __( 'TODO Section 3 Title', 'wordpress' ), 
      array($this, 'settings_section_3_callback'), 
      'TODOPluginPage'
    );

    add_settings_field( 
      'field_name_3', 
      __( 'TODO Field Name', 'wordpress' ), 
      array($this, 'field_name_3_render'), 
      'TODOPluginPage', 
      'TODOPluginPage_section_3' 
    );

    add_settings_field( 
      'field_name_4', 
      __( 'TODO Field Name', 'wordpress' ), 
      array($this, 'field_name_4_render'), 
      'TODOPluginPage', 
      'TODOPluginPage_section_3' 
    );

  }

  function field_name_1_render(  ) { 

    $options = get_option( 'settings', self::settings_get_defaults() );
    ?>
    <input type='text' name='settings[field_name_1]'
      value='<?php echo $options['field_name_1']; ?>'>
    <?php

  }


  function field_name_2_render(  ) { 

    $options = get_option( 'settings', self::settings_get_defaults() );
    ?>
    <input type='text' name='settings[field_name_2]'
      value='<?php echo $options['field_name_2']; ?>'>
    <?php

  }


  function field_name_3_render(  ) { 

    $options = get_option( 'settings', self::settings_get_defaults() );
    ?>
    <textarea cols='40' rows='5' name='settings[field_name_3]'><?php
      echo $options['field_name_3'];
    ?></textarea>
    <?php

  }


  function field_name_4_render(  ) { 

    $options = get_option( 'settings', self::settings_get_defaults() );
    ?>
    <textarea cols='40' rows='5' name='settings[field_name_4]'><?php
      echo $options['field_name_4'];
    ?></textarea>
    <?php

  }


  function settings_section_1_callback(  ) { 

    echo __( 'TODO Section 1 extra text.', 'wordpress' );

  }

  function settings_section_2_callback(  ) { 

    echo __( 'TODO Section 2 extra text.', 'wordpress' );

  }

  function settings_section_3_callback(  ) { 

    echo __( 'TODO Section 3 extra text.', 'wordpress' );

  }

  function options_page(  ) { 

    ?>
    <form action='options.php' method='post'>
      
      <h2>[TODO Plugin Name Here]</h2>

      <?php
      settings_fields( 'TODOPluginPage' );
      do_settings_sections( 'TODOPluginPage' );
      submit_button();
      ?>

    </form>
    <?php

  }
}  // end class definition

?>
