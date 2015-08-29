<?php
if (!class_exists('Redux_Framework_sample_config')) {
    class Redux_Framework_sample_config {
        public $args= array();
        public $sections= array();
        public $theme;
        public $ReduxFramework;
        public function __construct() {
            if (!class_exists('ReduxFramework')) {
                return;
            }
            $this->initSettings();
        }
        public function initSettings() {
            $this->theme = wp_get_theme();
            $this->setArguments();
            $this->setSections();
            if (!isset($this->args['opt_name'])) {
                return;
            }
            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }
        function compiler_action($options, $css) {
        }
        function dynamic_section($sections) {
            $sections[] = array(
                              'title' =>'进程钩子',
                              'desc' =>'<p class="description">这是一段过滤器创建的数组。可以通过子主题添加/删除选项.</p>',
                              'icon' => 'el-icon-paper-clip',
                              'fields' => array()
                          );
            return $sections;
        }
        function change_arguments($args) {
            return $args;
        }
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';
            return $defaults;
        }
        public function setSections() {

            $this->sections[] = array(
                                    'icon'  => 'el-icon-wrench',
                                    'title' =>'基本设置',
                                    'fields'=> array(
                                                 array(
                                                     'id'=> 'opt-info-field',
                                                     'type'  => 'info',
                                                     'title'  =>'欢迎使用Uazoh7主题',
                                                     'desc'  =>'这个主题采用知名的后台定义框架Redux Framework，丰富的后台定义参数及炫酷的前台效果，将带您进入21世纪新的网站体验.同时如果想压缩页面HTML\JS\CSS，可以选择WP-MINIFY等插件进行'
                                                 ),
                                                 array(
                                                     'id'=> 'responsive_enabled',
                                                     'type'  => 'switch',
                                                     'title' =>'响应式前端设计',
                                                     'subtitle'  =>'激活这个选项，将打开响应式前台，可判断多种客户端的分辨率进行界面构成，提高用户浏览体验.',
                                                     'default'   => 1,
                                                     'on'=> '开启',
                                                     'off'   => '关闭',
                                                 ),
                                                 array(
                                                     'id'=> 'custom_favicon',
                                                     'type'  => 'media',
                                                     'url'   => true,
                                                     'title' =>'自定义Favicon',
                                                     'subtitle'  =>'上传一个 16 x 16 像素、Png/Gif 格式的图片作为网站的 favicon.'
                                                 ),
                                                 array(
                                                     'id'=> 'custom_logo',
                                                     'type'  => 'media',
                                                     'url'   => true,
                                                     'title' =>'自定义Logo',
                                                     'subtitle'  =>'上传图片作为LOGO.',
                                                 ),
                                                 array(
                                                     'id'=> 'site_logo_name',
                                                     'type'  => 'text',
                                                     'title' =>'LOGO旁边主页名称定义',
                                                     'default'   => 'Uazoh7'
                                                 ),
                                                 array(
                                                     'id'=> 'logo_displaytext',
                                                     'type'  => 'text',
                                                     'title' =>'非首页LOGO下说明文字',
                                                     'subtitle'  =>'例如400电话、口号、标语等内容 ',
                                                     'default'   => '极致、简约、细节、亲和'
                                                 ),
                                                 array(
                                                     'id'=> 'copyright_textarea',
                                                     'type'  => 'editor',
                                                     'title' =>'Footer版权信息',
                                                     'subtitle'  =>'举例: Copyright 2015 | 优佐生活.',
                                                     'default'   => '© Copyright 2015 by <a href="http://www.uazoh.com">uazoh7</a>. All Rights Reserved.',
                                                 ),
                                                 array(
                                                     'id'=> 'tags_more_enabled',
                                                     'type'  => 'switch',
                                                     'title' =>'显示更多标签选项',
                                                     'subtitle'  =>'更多标签按钮选项，需要自己使用Tags模板定义页面并输入页面地址',
                                                     'default'   => 0,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
                                                 array(
                                                     'id'=> 'tags_more_url',
                                                     'type'  => 'text',
                                                     'required'  => array('tags_more_enabled', '=', '1'),
                                                     'title' =>'更多标签页面地址',
                                                     'subtitle'  =>'需要自己定义页面，使用tags模板',
                                                     'default'   => 'http://',
                                                 ),
                                                 array(
                                                     'id'=> 'footer_css_js',
                                                     'type'  => 'textarea',
                                                     'title' =>'Footer添加内容',
                                                     'subtitle'  =>'例如添加原创信息，请用HTML格式输入'
                                                 ),
                                             )
                                );
            $this->sections[] = array(
                                    'icon'  => 'el-icon-brush',
                                    'title' =>'样式设置',
                                    'fields'=> array(
                                                 array(
                                                     'id'=> 'scheme',
                                                     'type'  => 'select',
                                                     'title' =>'主题颜色选择',
                                                     'subtitle'  =>'CSS文件储存在主题目录下的 `/css/` 内，可以自行更改',
                                                     'options'   => array('color.css' => '默认', 'color2.css' => 'color2.css', 'color3.css' => 'color3.css', 'color4.css' => 'color4.css', 'color5.css' => 'color5.css', 'color6.css' => 'color6.css', 'color7.css' => 'color7.css', 'color8.css' => 'color8.css'),
                                                     'default'   => 'color.css',
                                                 ),
                                                 array(
                                                     'id'=> 'body_background',
                                                     'type'  => 'color',
                                                     'title' =>'页面背景颜色',
                                                     'subtitle'  =>'自定义页面背景颜色（在VC内单独定义的背景颜色不受影响，默认颜色: #efefef).',
                                                     'default'   => '#efefef',
                                                     'transparent' => false,
                                                 ),
                                                 array(
                                                     'id'=> 'selected_text_background',
                                                     'type'  => 'color',
                                                     'title' =>'文字反选颜色',
                                                     'subtitle'  =>'部分浏览器不支持，默认蓝色.',
                                                     'default'   => '',
                                                     'transparent' => false,
                                                 ),
                                                 array(
                                                     'id'=> 'enable_to_the_top',
                                                     'type'  => 'switch',
                                                     'title' =>'返回顶部按钮',
                                                     'subtitle'  =>'开启后，右下角会在屏幕向下滚动一屏之后出现一个按钮',
                                                     'default'   => 1,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
                                                 array(
                                                     'id'=> 'enable_preloader',
                                                     'type'  => 'switch',
                                                     'title' =>'预加载',
                                                     'subtitle'  =>'预加载(preloader)开启后，会用进度条代替页面内容，直到首页加载完毕统一展示',
                                                     'default'   => 1,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
                                                 array(
                                                     'id'=> 'pattern',
                                                     'type'  => 'image_select',
                                                     'title' =>'图案背景填充',
                                                     'subtitle'  =>'可以使用一款预置图案填充背景',
                                                     'options'   => array(
                                                                      'bg12' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg12.png'),
                                                                      'bg1' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg1.png'),
                                                                      'bg2' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg2.png'),
                                                                      'bg3' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg3.png'),
                                                                      'bg4' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg4.png'),
                                                                      'bg5' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg5.png'),
                                                                      'bg6' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg6.png'),
                                                                      'bg7' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg7.png'),
                                                                      'bg8' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg8.png'),
                                                                      'bg9' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg9.png'),
                                                                      'bg10' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg10.png'),
                                                                      'bg11' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg11.png'),
                                                                      'bg14' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg14.png'),
                                                                      'bg15' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg15.png'),
                                                                      'bg16' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg16.png'),
                                                                      'bg17' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg17.png'),
                                                                      'bg18' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg18.png'),
                                                                      'bg19' => array('alt' => '',  'img' => ReduxFramework::$_url . 'assets/img/bg19.png')
                                                                  ),
                                                     'default'   => 'bg12'
                                                 ),
                                                 array(
                                                     'id'=> 'more_css',
                                                     'type'  => 'textarea',
                                                     'title' =>'自定义CSS',
                                                     'subtitle'  =>'快速自定义部分CSS内容',
                                                     'validate'  => 'css',
                                                 ),
                                                 array(
                                                     'id'=> 'js_editor',
                                                     'type'  => 'ace_editor',
                                                     'title' =>'自定义JS',
                                                     'subtitle'  =>'快速自定义部分JS内容',
                                                     'mode'  => 'javascript',
                                                     'theme' => 'chrome',
                                                     'default'   => ""
                                                 ),
                                             )
                                );
            $this->sections[] = array(
                                    'icon'  => 'el-icon-briefcase',
                                    'title' =>'首页Silder',
                                    'fields'=> array(
												array(
                                                     'id'=> 'opt-info-field',
                                                     'type'  => 'info',
                                                     'title'  =>'首页设置',
                                                     'desc'  =>'1. 新建一个页面，将HomePage模板设置为这个页面的模板。<br />2. 进入设置→阅读，将首页显示更改为“一个静态页面”，并且将主页更改为刚才你新建的页面即可。'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_style_text',
                                                     'type'  => 'text',
                                                     'title' =>'浮块样式扩展',
                                                     'subtitle'  =>'定义浮块CSS扩展，默认浮块靠上，可添加扩展样式',
                                                     'default'   => 'transition2d: all; slidedelay: 6000; durationin: 1000; easingin: easeOutExpo;'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_1',
                                                     'type'  => 'switch',
                                                     'title' =>'Silder-1',
                                                     'subtitle'  =>'打开第一张Silder.',
                                                     'default'   => 0,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_1_img',
                                                     'type'  => 'media',
                                                     'required'  => array('silder_num_1', '=', '1'),
                                                     'url'   => true,
                                                     'title' =>'图像',
                                                     'subtitle'  =>'建议尺寸1680px x 500px.',
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_1_block_h3',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_1', '=', '1'),
                                                     'title' =>'浮动块H3文字',
                                                     'default'   => 'Uazoh7'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_1_block_h2',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_1', '=', '1'),
                                                     'title' =>'浮动块H2文字',
                                                     'default'   => 'THEME'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_1_block_p',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_1', '=', '1'),
                                                     'title' =>'浮动块正文',
                                                     'default'   => '<a href="Uazoh.com">Uazoh.com</a>新主题Uazoh7问世啦！欢迎大家使用，嘿嘿。'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_1_block_top',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_1', '=', '1'),
                                                     'title' =>'第一张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-300',
                                                     'default'   => 300,
                                                     'min'   => 0,
                                                     'step'  => 10,
                                                     'max'   => 300,
                                                     'display_value' => 'text'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_1_block_left',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_1', '=', '1'),
                                                     'title' =>'第一张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-1000',
                                                     'default'   => 15,
                                                     'min'   => 0,
                                                     'step'  => 5,
                                                     'max'   => 1000,
                                                     'display_value' => 'text'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_2',
                                                     'type'  => 'switch',
                                                     'title' =>'Silder-2',
                                                     'subtitle'  =>'打开第二张Silder.',
                                                     'default'   => 0,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_2_img',
                                                     'type'  => 'media',
                                                     'required'  => array('silder_num_2', '=', '1'),
                                                     'url'   => true,
                                                     'title' =>'图像',
                                                     'subtitle'  =>'建议尺寸1680px x 500px.'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_2_block_h3',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_2', '=', '1'),
                                                     'title' =>'浮动块H3文字',
                                                     'default'   => 'Uazoh7'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_2_block_h2',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_2', '=', '1'),
                                                     'title' =>'浮动块H2文字',
                                                     'default'   => 'THEME'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_2_block_p',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_2', '=', '1'),
                                                     'title' =>'浮动块正文',
                                                     'default'   => '<a href="Uazoh.com">Uazoh.com</a>新主题Uazoh7问世啦！欢迎大家使用，嘿嘿。'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_2_block_top',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_2', '=', '1'),
                                                     'title' =>'第二张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-300',
                                                     'default'   => 300,
                                                     'min'   => 0,
                                                     'step'  => 10,
                                                     'max'   => 300,
                                                     'display_value' => 'text'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_2_block_left',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_2', '=', '1'),
                                                     'title' =>'第二张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-1000',
                                                     'default'   => 15,
                                                     'min'   => 0,
                                                     'step'  => 5,
                                                     'max'   => 1000,
                                                     'display_value' => 'text'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_3',
                                                     'type'  => 'switch',
                                                     'title' =>'Silder-3',
                                                     'subtitle'  =>'打开第三张Silder.',
                                                     'default'   => 0,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_3_img',
                                                     'type'  => 'media',
                                                     'required'  => array('silder_num_3', '=', '1'),
                                                     'url'   => true,
                                                     'title' =>'图像',
                                                     'subtitle'  =>'建议尺寸1680px x 500px.',
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_3_block_h3',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_3', '=', '1'),
                                                     'title' =>'浮动块H3文字',
                                                     'default'   => 'Uazoh7'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_3_block_h2',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_3', '=', '1'),
                                                     'title' =>'浮动块H2文字',
                                                     'default'   => 'THEME'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_3_block_p',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_3', '=', '1'),
                                                     'title' =>'浮动块正文',
                                                     'default'   => '<a href="Uazoh.com">Uazoh.com</a>新主题Uazoh7问世啦！欢迎大家使用，嘿嘿。'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_3_block_top',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_3', '=', '1'),
                                                     'title' =>'第三张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-300',
                                                     'default'   => 300,
                                                     'min'   => 0,
                                                     'step'  => 10,
                                                     'max'   => 300,
                                                     'display_value' => 'text'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_3_block_left',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_3', '=', '1'),
                                                     'title' =>'第三张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-1000',
                                                     'default'   => 15,
                                                     'min'   => 0,
                                                     'step'  => 5,
                                                     'max'   => 1000,
                                                     'display_value' => 'text'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_4',
                                                     'type'  => 'switch',
                                                     'title' =>'Silder-4',
                                                     'subtitle'  =>'打开第四张Silder.',
                                                     'default'   => 0,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_4_img',
                                                     'type'  => 'media',
                                                     'required'  => array('silder_num_4', '=', '1'),
                                                     'url'   => true,
                                                     'title' =>'图像',
                                                     'subtitle'  =>'建议尺寸1680px x 500px.',
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_4_block_h3',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_4', '=', '1'),
                                                     'title' =>'浮动块H3文字',
                                                     'default'   => 'Uazoh7'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_4_block_h2',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_4', '=', '1'),
                                                     'title' =>'浮动块H2文字',
                                                     'default'   => 'THEME'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_4_block_p',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_4', '=', '1'),
                                                     'title' =>'浮动块正文',
                                                     'default'   => '<a href="Uazoh.com">Uazoh.com</a>新主题Uazoh7问世啦！欢迎大家使用，嘿嘿。'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_4_block_top',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_4', '=', '1'),
                                                     'title' =>'第四张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-300',
                                                     'default'   => 300,
                                                     'min'   => 0,
                                                     'step'  => 10,
                                                     'max'   => 300,
                                                     'display_value' => 'text'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_4_block_left',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_4', '=', '1'),
                                                     'title' =>'第四张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-1000',
                                                     'default'   => 15,
                                                     'min'   => 0,
                                                     'step'  => 5,
                                                     'max'   => 1000,
                                                     'display_value' => 'text'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_5',
                                                     'type'  => 'switch',
                                                     'title' =>'Silder-5',
                                                     'subtitle'  =>'打开第五张Silder.',
                                                     'default'   => 0,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_5_img',
                                                     'type'  => 'media',
                                                     'required'  => array('silder_num_5', '=', '1'),
                                                     'url'   => true,
                                                     'title' =>'图像',
                                                     'subtitle'  =>'建议尺寸1680px x 500px.',
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_5_block_h3',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_5', '=', '1'),
                                                     'title' =>'浮动块H3文字',
                                                     'default'   => 'Uazoh7'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_5_block_h2',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_5', '=', '1'),
                                                     'title' =>'浮动块H2文字',
                                                     'default'   => 'THEME'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_5_block_p',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_5', '=', '1'),
                                                     'title' =>'浮动块正文',
                                                     'default'   => '<a href="Uazoh.com">Uazoh.com</a>新主题Uazoh7问世啦！欢迎大家使用，嘿嘿。'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_5_block_top',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_5', '=', '1'),
                                                     'title' =>'第三张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-300',
                                                     'default'   => 300,
                                                     'min'   => 0,
                                                     'step'  => 10,
                                                     'max'   => 300,
                                                     'display_value' => 'text'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_5_block_left',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_5', '=', '1'),
                                                     'title' =>'第五张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-1000',
                                                     'default'   => 15,
                                                     'min'   => 0,
                                                     'step'  => 5,
                                                     'max'   => 1000,
                                                     'display_value' => 'text'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_6',
                                                     'type'  => 'switch',
                                                     'title' =>'Silder-6',
                                                     'subtitle'  =>'打开第六张Silder.',
                                                     'default'   => 0,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_6_img',
                                                     'type'  => 'media',
                                                     'required'  => array('silder_num_6', '=', '1'),
                                                     'url'   => true,
                                                     'title' =>'图像',
                                                     'subtitle'  =>'建议尺寸1680px x 500px.',
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_6_block_h3',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_6', '=', '1'),
                                                     'title' =>'浮动块H3文字',
                                                     'default'   => 'Uazoh7'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_6_block_h2',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_6', '=', '1'),
                                                     'title' =>'浮动块H2文字',
                                                     'default'   => 'THEME'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_6_block_p',
                                                     'type'  => 'text',
                                                     'required'  => array('silder_num_6', '=', '1'),
                                                     'title' =>'浮动块正文',
                                                     'default'   => '<a href="Uazoh.com">Uazoh.com</a>新主题Uazoh7问世啦！欢迎大家使用，嘿嘿。'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_6_block_top',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_6', '=', '1'),
                                                     'title' =>'第六张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-300',
                                                     'default'   => 300,
                                                     'min'   => 0,
                                                     'step'  => 10,
                                                     'max'   => 300,
                                                     'display_value' => 'text'
                                                 ),
                                                 array(
                                                     'id'=> 'silder_num_6_block_left',
                                                     'type'  => 'slider',
                                                     'required'  => array('silder_num_6', '=', '1'),
                                                     'title' =>'第六张Silder浮动块TOP值',
                                                     'subtitle'  =>'设置数量0-1000',
                                                     'default'   => 15,
                                                     'min'   => 0,
                                                     'step'  => 5,
                                                     'max'   => 1000,
                                                     'display_value' => 'text'
                                                 ),
                                             )
                                );
            $this->sections[] = array(
                                    'icon'  => 'el-icon-website',
                                    'title' =>'Blog',
                                    'fields'=> array(
                                                 array(
                                                     'id'=> 'blog_sidebar_pos',
                                                     'type'  => 'image_select',
                                                     'title' =>'边栏对齐方式',
                                                     'subtitle'  =>'可以设置BLOG页面的边栏对齐方式',
                                                     'options'   => array(
                                                                      '2' => array('alt' => '右边栏',  'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
                                                                      '1' => array('alt' => '左边栏',  'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
                                                                      '0' => array('alt' => '无边栏',  'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
                                                                  ),
                                                     'default'   => '1'
                                                 ),
                                                 array(
                                                     'id'=> 'blog_sidebar',
                                                     'type'  => 'select',
                                                     'title' =>'BLOG页面使用的边栏名称',
                                                     'subtitle'  =>'在小工具页面设置',
                                                     'data'  => 'sidebars',
                                                     'default' => 'sidebar',
                                                 ),
                                                 array(
                                                     'id'=> 'social_box',
                                                     'type'  => 'switch',
                                                     'title' =>'社交分享按钮',
                                                     'subtitle'  =>'如果想在博客详情页开启社交分享按钮，请选择开启。',
                                                     'default'   => 1,
                                                     'on'=> '开启',
                                                     'off'   => '关闭',
                                                 ),
                                                 array(
                                                     'id'=> 'author_box',
                                                     'type'  => 'switch',
                                                     'title' =>'作者信息',
                                                     'subtitle'  =>'仅限创始人使用，是否在博客详情页开启作者信息.',
                                                     'default'   => 0,
                                                     'on'=> '开启',
                                                     'off'   => '关闭',
                                                 ),
                                                 array(
                                                     'id'=> 'author_name',
                                                     'type'  => 'text',
                                                     'required'  => array('author_box', '=', '1'),
                                                     'title' =>'作者姓名',
                                                     'subtitle'  =>'仅限创始人使用，10个字以内',
                                                 ),
                                                 array(
                                                     'id'=> 'author_work',
                                                     'type'  => 'text',
                                                     'required'  => array('author_box', '=', '1'),
                                                     'title' =>'作者职业',
                                                     'subtitle'  =>'仅限创始人使用，10个字以内',
                                                 ),
                                                 array(
                                                     'id'=> 'author_avatar',
                                                     'type'  => 'media',
                                                     'required'  => array('author_box', '=', '1'),
                                                     'url'   => true,
                                                     'title' =>'头像',
                                                     'subtitle'  =>'仅限创始人使用，建议尺寸500px x 500px.'
                                                 ),
                                                 array(
                                                     'id'=> 'prev_next_posts',
                                                     'type'  => 'switch',
                                                     'title' =>'显示相关文章',
                                                     'subtitle'  =>'在详情下方显示相关文章以及控制数量',
                                                     'default'   => 0,
                                                     'on'=> '开启',
                                                     'off'   => '关闭',
                                                 ),
                                                 array(
                                                     'id'=> 'prev_next_posts_num',
                                                     'type'  => 'slider',
                                                     'required'  => array('prev_next_posts', '=', '1'),
                                                     'title' =>'相关文章数量',
                                                     'subtitle'  =>'设置数量4-10，数量越多速度越慢，默认值6',
                                                     'default'   => 6,
                                                     'min'   => 4,
                                                     'step'  => 1,
                                                     'max'   => 10,
                                                     'display_value' => 'text'
                                                 ),
                                             )
                                );
            /* 2zzt专版参数 */
            $this->sections[] = array(
                                    'icon'  => 'el-icon-star',
                                    'title' =>'首页图标',
                                    'fields'=> array(
                                                 array(
                                                     'id'=> 'opt-version-field',
                                                     'type'  => 'info',
                                                     'title'  =>'2zzt专版参数',
                                                     'desc'  =>'此版本为2zzt.com大叔网站专版首页公开参数，结合上面的Slider即可构造出和演示地址demo.uazoh.com一样的首页'
                                                 ),
                                                 array(
                                                     'id'=> 'class_news',
                                                     'type'  => 'switch',
                                                     'title' =>'首页图标介绍',
                                                     'subtitle'  =>'首页下方红底白图标白字的4个简短的简介（仅支持4个）',
                                                     'default'   => 1,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
                                                 array(
                                                     'id'=> 'class_01_title',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title'  =>'第一个标题',
                                                     'desc'  =>'',
                                                     'default'   => '标准'
                                                 ),
                                                 array(
                                                     'id'=> 'class_01',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title'  =>'第一个下方简短介绍',
                                                     'desc'  =>'',
                                                     'default'   => '采用Bootstrap前端框架，保证适应性'
                                                 ),
                                                 array(
                                                     'id'=> 'class_01_icon',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title' =>'第一个使用图标',
                                                     'desc'  =>'使用“fa-”后的参数，详见<a href="http://fontawesome.io/icons/" target="_blank">Font Awesome图标系统</a>',
                                                     'default'   => 'bold'
                                                 ),
                                                 array(
                                                     'id'=> 'class_02_title',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title'  =>'第二个标题',
                                                     'desc'  =>'',
                                                     'default'   => '完善'
                                                 ),
                                                 array(
                                                     'id'=> 'class_02',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title'  =>'第二个下方简短介绍',
                                                     'desc'  =>'',
                                                     'default'   => '自定义后台功能，不用动不动改代码'
                                                 ),
                                                 array(
                                                     'id'=> 'class_02_icon',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title' =>'第二个使用图标',
                                                     'desc'  =>'使用“fa-”后的参数，详见<a href="http://fontawesome.io/icons/" target="_blank">Font Awesome图标系统</a>',
                                                     'default'   => 'cog'
                                                 ),
                                                 array(
                                                     'id'=> 'class_03_title',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title'  =>'第三个标题',
                                                     'desc'  =>'',
                                                     'default'   => '智能'
                                                 ),
                                                 array(
                                                     'id'=> 'class_03',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title'  =>'第三个下方简短介绍',
                                                     'desc'  =>'',
                                                     'default'   => '因需而择，让内容因选择而改变'
                                                 ),
                                                 array(
                                                     'id'=> 'class_03_icon',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title' =>'第三个使用图标',
                                                     'desc'  =>'使用“fa-”后的参数，详见<a href="http://fontawesome.io/icons/" target="_blank">Font Awesome图标系统</a>',
                                                     'default'   => 'spotify'
                                                 ),
                                                 array(
                                                     'id'=> 'class_04_title',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title'  =>'第四个标题',
                                                     'desc'  =>'',
                                                     'default'   => '开源'
                                                 ),
                                                 array(
                                                     'id'=> 'class_04',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title'  =>'第四个下方简短介绍',
                                                     'desc'  =>'',
                                                     'default'   => '全部代码不存在加密、编译。完全开源。'
                                                 ),
                                                 array(
                                                     'id'=> 'class_04_icon',
                                                     'type'  => 'text',
                                                     'required'  => array('class_news', '=', '1'),
                                                     'title' =>'第四个使用图标',
                                                     'desc'  =>'使用“fa-”后的参数，详见<a href="http://fontawesome.io/icons/" target="_blank">Font Awesome图标系统</a>',
                                                     'default'   => 'flask'
                                                 ),
									));$this->sections[] = array(
                                    'icon'  => 'el-icon-network',
                                    'title' =>'首页项目展示',
                                    'fields'=> array(
                                                 array(
                                                     'id'=> 'feature_switch',
                                                     'type'  => 'switch',
                                                     'title' =>'项目展示',
                                                     'subtitle'  =>'请到外观 --> 小工具，设置首页项目展示小工具',
                                                     'default'   => 1,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
												 array(
                                                     'id'=> 'feature_title',
                                                     'type'  => 'text',
                                                     'required'  => array('feature_switch', '=', '1'),
                                                     'title'  =>'项目展示标题',
                                                     'desc'  =>'请不要输入过长以保证效果',
                                                     'default'   => '项目 <strong>预览</strong>'
                                                 ),
												 array(
                                                     'id'=> 'feature_subheading',
                                                     'type'  => 'text',
                                                     'required'  => array('feature_switch', '=', '1'),
                                                     'title'  =>'项目展示副标题',
                                                     'desc'  =>'如果不想显示请留空',
                                                     'default'   => '部分页面预览图为测试数据，实际效果相差无异。'
                                                 ),
												 array(
                                                     'id'=> 'feature_yext',
                                                     'type'  => 'textarea',
                                                     'required'  => array('feature_switch', '=', '1'),
                                                     'title'  =>'项目展示简短文字介绍',
                                                     'desc'  =>'如果不想显示请留空，建议不超过100个字符',
                                                     'default'   => 'Uazoh为一个自创词，是由两个人的名字所包含的字母，重新排列组合构成，中文为优佐，所包含的业务包括零售业的“优佐生活”及设计工作室“优佐Desgin”。在这里再次感谢您使用Uazoh7主题（WordPress版）'
                                                 ),
									));$this->sections[] = array(
                                    'icon'  => 'el-icon-network',
                                    'title' =>'首页关于我们',
                                    'fields'=> array(
                                                 array(
                                                     'id'=> 'about_uss',
                                                     'type'  => 'switch',
                                                     'title' =>'关于我们',
                                                     'subtitle'  =>'一个灰色底通栏的栏目.',
                                                     'default'   => 1,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
												 array(
                                                     'id'=> 'about_uss_title',
                                                     'type'  => 'text',
                                                     'required'  => array('about_uss', '=', '1'),
                                                     'title'  =>'关于我们标题',
                                                     'desc'  =>'请不要输入过长以保证效果,<span>内文字为高亮文字',
                                                     'default'   => '欢迎使用 <strong>Uazoh7</strong> &#8211; <span>HTML5/CSS3</span> WordPress 模板'
                                                 ),
												 array(
                                                     'id'=> 'about_uss_yext',
                                                     'type'  => 'textarea',
                                                     'required'  => array('about_uss', '=', '1'),
                                                     'title'  =>'关于我们简短文字介绍',
                                                     'desc'  =>'如果不想显示请留空，建议不超过100个字符',
                                                     'default'   => '目前全面支持wordpress4.0+，服务器需要php5.1+。'
                                                 ),
												 array(
                                                     'id'=> 'about_uss_links_1_text',
                                                     'type'  => 'text',
                                                     'required'  => array('about_uss', '=', '1'),
                                                     'title'  =>'高亮按钮显示文字',
                                                     'desc'  =>'如果不想显示请留空，建议不超过100个字符',
                                                     'default'   => '查看Uazoh博客'
                                                 ),
												 array(
                                                     'id'=> 'about_uss_links_1',
                                                     'type'  => 'text',
                                                     'required'  => array('about_uss', '=', '1'),
                                                     'title'  =>'高亮按钮链接',
                                                     'desc'  =>'按钮文字如果为空，则此项不生效',
                                                     'default'   => 'http://www.uazoh.com'
                                                 ),
												 array(
                                                     'id'=> 'about_uss_links_2_text',
                                                     'type'  => 'text',
                                                     'required'  => array('about_uss', '=', '1'),
                                                     'title'  =>'黑色按钮显示文字',
                                                     'desc'  =>'如果不想显示请留空，建议不超过100个字符',
                                                     'default'   => '下载Uazoh7免费版'
                                                 ),
												 array(
                                                     'id'=> 'about_uss_links_2',
                                                     'type'  => 'text',
                                                     'required'  => array('about_uss', '=', '1'),
                                                     'title'  =>'黑色按钮链接',
                                                     'desc'  =>'按钮文字如果为空，则此项不生效',
                                                     'default'   => 'http://www.2zzt.com/cmszhuti/7167.html'
                                                 ),
									));$this->sections[] = array(
                                    'icon'  => 'el-icon-network',
                                    'title' =>'首页文章',
                                    'fields'=> array(
                                                 array(
                                                     'id'=> 'homepage_post',
                                                     'type'  => 'switch',
                                                     'title' =>'首页文章',
                                                     'subtitle'  =>'请到外观 --> 小工具，设置首页文章小工具.',
                                                     'default'   => 1,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
												 array(
                                                     'id'=> 'homepage_post_title',
                                                     'type'  => 'text',
                                                     'required'  => array('homepage_post', '=', '1'),
                                                     'title'  =>'首页文章标题',
                                                     'desc'  =>'不想使用请留空',
                                                     'default'   => '最新 <strong>文章</strong>'
                                                 ),
												 array(
                                                     'id'=> 'homepage_post_num',
                                                     'type'  => 'slider',
                                                     'required'  => array('homepage_post', '=', '1'),
                                                     'title' =>'首页文章数量',
                                                     'subtitle'  =>'首页每次想显示多少篇文章，默认值4.必须设置小工具内文章数量足够',
                                                     'default'   => 4,
                                                     'min'   => 2,
                                                     'step'  => 1,
                                                     'max'   => 6,
                                                     'display_value' => 'text'
                                                 ),
								));$this->sections[] = array(
                                    'icon'  => 'el-icon-network',
                                    'title' =>'首页声明',
                                    'fields'=> array(
                                                 array(
                                                     'id'=> 'social_intro',
                                                     'type'  => 'info',
                                                     'title'  =>'2zzt专版声明',
                                                     'desc'  =>'位置位于Footer上方，如果有在页面内单独定义内容，位置不变'
                                                 ),
                                                 array(
                                                     'id'=> 'wicht',
                                                     'type'  => 'switch',
                                                     'title' =>'声明',
                                                     'subtitle'  =>'文章调用.',
                                                     'default'   => 1,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
												 array(
                                                     'id'=> 'wicht_title',
                                                     'type'  => 'text',
                                                     'required'  => array('wicht', '=', '1'),
                                                     'title'  =>'首页声明文字',
                                                     'desc'  =>'不想使用请留空，建议少于20个汉字',
                                                     'default'   => '模板 <strong>停止</strong> 出售'
                                                 ),
												 array(
                                                     'id'=> 'wicht_links_text',
                                                     'type'  => 'text',
                                                     'required'  => array('wicht', '=', '1'),
                                                     'title'  =>'首页声明按钮文字',
                                                     'desc'  =>'如果不想显示请留空，建议不超过6个汉字',
                                                     'default'   => '<i class="fa fa-user"></i>优佐'
                                                 ),
												 array(
                                                     'id'=> 'wicht_links',
                                                     'type'  => 'text',
                                                     'required'  => array('wicht', '=', '1'),
                                                     'title'  =>'首页声明按钮链接',
                                                     'desc'  =>'按钮文字如果为空，则此项不生效',
                                                     'default'   => 'http://www.uazoh.com'
                                                 ),
                                             )
                                );
            $this->sections[] = array(
                                    'icon'  => 'el-icon-network',
                                    'title' =>'订阅参数',
                                    'fields'=> array(
                                                 array(
                                                     'id'=> 'social_intro',
                                                     'type'  => 'info',
                                                     'title'  =>'订阅参数',
                                                     'desc'  =>'可以设置你的社交网站链接，如人人网、QQ、微博、Github等 .'
                                                 ),
												 array(
                                                     'id'=> 'header_social',
                                                     'type'  => 'switch',
                                                     'title' =>'社区化按钮',
                                                     'subtitle'  =>'会在HEADER显示订阅按钮.',
                                                     'default'   => 0,
                                                     'on'=> '开启',
                                                     'off'   => '关闭'
                                                 ),
                                                 array(
                                                     'id'=> 'rss',
                                                     'type'  => 'text',
                                                     'title' =>'RSS',
                                                     'default'   => 'http://www.uazoh.com/feed'
                                                 ),
                                                 array(
                                                     'id'=> 'weibo',
                                                     'type'  => 'text',
                                                     'title' =>'新浪微博',
                                                     'default'   => ''
                                                 ),
                                                 array(
                                                     'id'=> 'qq',
                                                     'type'  => 'text',
                                                     'title' =>'QQ空间',
                                                 ),
                                                 array(
                                                     'id'=> 'envelope',
                                                     'type'  => 'text',
                                                     'title' =>'E-mail',
                                                 ),
                                                 array(
                                                     'id'=> 'map-marker',
                                                     'type'  => 'text',
                                                     'title' =>'地址',
                                                     'default'   => '长春市朝阳区金谷国际XX楼XXXX公司',
                                                 ),
                                                 array(
                                                     'id'=> 'weixin',
                                                     'type'  => 'text',
                                                     'title' =>'微信',
                                                 ),
                                                 array(
                                                     'id'=> 'weixin_qrcode',
                                                     'type'  => 'media',
                                                     'url'   => true,
                                                     'title' =>'上传微信二维码',
                                                     'subtitle'  =>'尺寸请不要超过250px X 250px',
                                                 ),
                                                 array(
                                                     'id'=> 'phone',
                                                     'type'  => 'text',
                                                     'title' =>'咨询电话',
                                                 ),
                                             )
                                );
        }
        public function setArguments() {
            $theme = wp_get_theme();
            $this->args = array(
                              'opt_name'  => 'smof_data',
                              'display_name'  => $theme->get('Name'),
                              'display_version'   => $theme->get('Version'),
                              'menu_type' => 'menu',
                              'allow_sub_menu'=> true,
                              'menu_title'=>'Uazoh7选项',
                              'page_title'=>'Uazoh7选项',
                              'google_api_key' => 'AIzaSyBPVwg6CaFLmKlxYjQu0bJGpxDN1p04S-Q',
                              'async_typography'  => false,
                              'admin_bar' => true,
                              'global_variable'   => '',
                              'dev_mode'  => false,
                              'customizer'=> true,
                              'page_priority' => null,
                              'page_parent'   => 'themes.php',
                              'page_permissions'  => 'manage_options',
                              'menu_icon' => '',
                              'last_tab'  => '',
                              'page_icon' => 'icon-themes',
                              'page_slug' => '_options',
                              'save_defaults' => true,
                              'default_show'  => false,
                              'default_mark'  => '',
                              'transient_time'=> 60 * MINUTE_IN_SECONDS,
                              'output'=> true,
                              'output_tag'=> true,
                              'database'  => '',
                              'show_import_export'=> true,
                              'system_info'   => false,
                              'hints' => array(
                                           'icon'  => 'icon-question-sign',
                                           'icon_position' => 'right',
                                           'icon_color'=> 'lightgray',
                                           'icon_size' => 'normal',
                                           'tip_style' => array(
                                                            'color' => 'light',
                                                            'shadow'=> true,
                                                            'rounded'   => false,
                                                            'style' => '',
                                                        ),
                                           'tip_position'  => array(
                                                                'my' => 'top left',
                                                                'at' => 'bottom right',
                                                            ),
                                           'tip_effect'=> array(
                                                            'show'  => array(
                                                                         'effect'=> 'slide',
                                                                         'duration'  => '500',
                                                                         'event' => 'mouseover',
                                                                     ),
                                                            'hide'  => array(
                                                                         'effect'=> 'slide',
                                                                         'duration'  => '500',
                                                                         'event' => 'click mouseleave',
                                                                     ),),));

        }
    }
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}
if (!function_exists('redux_my_custom_field')):function redux_my_custom_field($field, $value) {    print_r($field);    echo '<br/>';    print_r($value);}endif;if (!function_exists('redux_validate_callback_function')):function redux_validate_callback_function($field, $value, $existing_value) {    $error = false;    $value = 'just testing';    $return['value'] = $value;    if ($error == true) {        $return['error'] = $field;    }return $return;}endif;

