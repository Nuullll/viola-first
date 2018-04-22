# viola-first

Welcome to [viola-wang.com](http://viola-wang.com)!

# wordpress后端管理不完全指南 —— for viola

## 登录管理界面

* 网址： http://viola-wang.com/wp-admin
* 用户名： `Viola`
* 密码：`******`

## 网站页面结构

* Home (page)
  ----------------
  * Circle of Life (portfolio)
  * iAir (portfolio)
  * Co-Parking (portfolio)
  * Wonder Planet (portfolio)
  * Wear Elsewhere (portfolio)
  * Protection for the Mini Breakers (portfolio)
  ----------------
  * Pen-and-ink Drawings (single image)
  * Chinese Ink Paintings (single image)
  * Photo of Gongbi Style (single image)
  * Red&White Rose (single image)
  * Analytical Chart (single image)

## 基本操作

### 更新portfolio

点击左侧导航栏的**Portfolio**即可查看已有portfolio。

不同portfolio展示图片的方式不同，进入具体某个portfolio编辑页面即可看到portfolio展示页面的设置及具体构成。

修改过程中可以点击`Preview Changes`预览，修改完成可点击`Update`发布更新。

`Revisions`包含了该页面所有发布过的历史版本，可以随时回滚。Dont' panic.

* 页面内容编辑器（WPBakery Page Builder）

  * 三种编辑模式
  
    * Classic Mode
    
    * Backend Editor (默认，推荐）
    
    * Frontend Editor
    
  * 通过行列单元自由布局页面，有多种元素可以添加（左上角➕），每种元素都有丰富的设置
  
  * 例如`Circle of Life`页面内只有一个元素`Photos Masonry & Grid`，是The7主题自带的一种用于展示`Photo Albums`的元素，点击设置即可选择需要展示的`Album`以及其他参数（列数、最小宽度等）
  
    * 只能选择要展示的`Album`类别（category），而不能直接选择特定的`Album`
    
    * 左侧导航栏`Photo Albums`可查看已有`Album`
    
    * 进入特定`Album`编辑页面可以修改`Album`内的图片：直接选择`Media`中的图片或选择本地文件上传至`Media`媒体库
    
    * `Album`的其他设置是为`Album`单独的展示页面服务的，我们不需要关心
    
* 标题栏（Page Header Options）

  * 可以在标题栏嵌入`Slideshow`（例如`iAir`）
  
    * `Layout`选择`Fullscreen slideshow`则页面只显示slideshow（页面设置的其他内容包括footer均不显示）
    
    * 同理左侧导航栏`Slideshows`可修改具体各`Slideshow`图片内容
    
* 作品集类别（Portfolio Categories）

  * 会在Home页面各Portfolio标题下方显示
  
  * 其实这个应该设置成`Excerpt`
  
  * 但我懒得改了
  
* Featured Image

  * 主页及`next-previous`导航栏中显示的作品集缩略图
  
  * 若要修改，先`Remove featured image`，再选择新图片
  
* 侧边栏（Siderbar Options）

  * 默认关闭
  
  * 如果想设置侧边栏，其内容可完全自定义，请联系我
  
* Footer Options

  * 选择`Next-prev Javascript Footer`，以保证`next-previous`导航栏功能正确
  
* page CSS

  * WPBakery Page Builder 右上角⚙️
  
  * 对该portfolio页面设置单独的css

### 全站css自定义

上面讲到了可以对每个页面设置单独的css，若要增加整个网站的css规则：左侧导航栏`Apperance->Edit CSS->Additonal CSS`

* 直接修改即可，右侧可实时预览页面样式变化

* 也可使用`LESS CSS`开发，本地编译成正经CSS后再复制上去（例如[custom.less](css/custom.less)->[custom.css](css/compiled/custom.css)），还是联系我吧

### js的使用

有时候仅靠css还不能实现想要的效果，可以考虑在页面内嵌入javascript代码

* 几种嵌入方式

  * 直接在`WPBakery Page Builder`添加`Raw js`元素，嵌入某个页面。例如：
  
    * [custom_photoswipe.js](js/custom_photoswipe.js)
    
      * 位置：Home
      
      * 功能：设置Other work中图片点击后弹窗中图片的默认大小
      
    * [heading_special_characters.js](js/heading_special_characters.js)
    
      * 位置：Home
      
      * 功能：Other work中各图片标题使用的字体（Lucky Turns）不支持特殊字符，将特殊字符的字体更换为其他字体（wc_mano_negra_btaregular）
      
    * [music_player.js](js/music_player.js)
    
      * 位置：Home
      
      * 功能：生成主页右下角的悬浮音乐播放器
      
    * [relocate_full_screen_button.js](js/relocate_full_screen_button.js)
    
      * 位置：iAir, Wear Elsewhere, Protection for the Mini Breakers
      
      * 功能：将slideshow的全屏按钮重定位至右上角
      
  * 在`footer`中添加`custom HTML`，嵌入js代码，可以方便地通过footer将同一段脚本嵌入多个页面
  
    * [next_prev_nav_layout.js](js/next_prev_nav_layout.js)
    
      * 位置: `Next-prev Javascript Footer`（被所有portfolio页面使用）
      
      * 功能：在`next-previous`导航栏增加`featured image`

基本操作好像就这些。试试看。
