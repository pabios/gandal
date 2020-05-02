<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html lang='en' class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/marcobiedermann/pen/LLGwLb?limit=all&page=4&q=editor" />

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.26.0/codemirror.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.26.0/theme/material.css'>
<style class="cp-pen-styles">/* helpers/grid.css */

.grid {
  width: 100%;
}

.grid__row {
  display: flex;
}

.grid__col {
  flex-grow: 1;
}

.grid__col--4 {
  width: calc(100% / 3);
}

/* layout/base.css */

* {
  box-sizing: inherit;
}

html {
  box-sizing: border-box;
  height: 100%;
}

body {
  font-family: sans-serif;
  line-height: 1.5;
  margin: 0;
  min-height: 100%;
}

/* modules/code.css */

.pre {
  height: 100vh;
}

/* modules/embed.css */

iframe {
  border: 0;
  height: 100%;
  width: 100%;
}

/* modules/form.css */

textarea {
  background: none;
  border: 0;
  height: 100vh;
  margin: 0;
  padding: 0.5em;
  width: 100%;
}

/* vendor/codemirror.css */

.CodeMirror {
  height: 100vh;
}

.CodeMirror-readonly .CodeMirror-cursor {
  display: none;
}
</style></head><body>
<div class="grid">

  <div class="grid__row">

    <div class="grid__col grid__col--4">
      <textarea class="js-input"># An exhibit of Markdown

This note demonstrates some of what [Markdown][1] is capable of doing.

*Note: Feel free to play with this page. Unlike regular notes, this doesn't automatically save itself.*

## Basic formatting

Paragraphs can be written like so. A paragraph is the basic block of Markdown. A paragraph is what text will turn into when there is no reason it should become anything else.

Paragraphs must be separated by a blank line. Basic formatting of *italics* and **bold** is supported. This *can be **nested** like* so.

## Lists

### Ordered list

1. Item 1
2. A second item
3. Number 3
4. Ⅳ

*Note: the fourth item uses the Unicode character for [Roman numeral four][2].*

### Unordered list

* An item
* Another item
* Yet another item
* And there's more...

## Paragraph modifiers

### Code block

    Code blocks are very useful for developers and other people who look at code or other things that are written in plain text. As you can see, it uses a fixed-width font.

You can also make `inline code` to add code into other things.

### Quote

> Here is a quote. What this is should be self explanatory. Quotes are automatically indented when they are used.

## Headings

There are six levels of headings. They correspond with the six levels of HTML headings. You've probably noticed them already in the page. Each level down uses one more hash character.

### Headings *can* also contain **formatting**

### They can even contain `inline code`

Of course, demonstrating what headings look like messes up the structure of the page.

I don't recommend using more than three or four levels of headings here, because, when you're smallest heading isn't too small, and you're largest heading isn't too big, and you want each size up to look noticeably larger and more important, there there are only so many sizes that you can use.

## URLs

URLs can be made in a handful of ways:

* A named link to [MarkItDown][3]. The easiest way to do these is to select what you want to make a link and hit `Ctrl+L`.
* Another named link to [MarkItDown](http://www.markitdown.net/)
* Sometimes you just want a URL like http://www.markitdown.net/.

## Horizontal rule

A horizontal rule is a line that goes across the middle of the page.

---

It's sometimes handy for breaking things up.

## Images

Markdown can also contain images. I'll need to add something here sometime.

## Finally

There's actually a lot more to Markdown than this. See the official [introduction][4] and [syntax][5] for more information. However, be aware that this is not using the official implementation, and this might work subtly differently in some of the little things.


  [1]: http://daringfireball.net/projects/markdown/
  [2]: http://www.fileformat.info/info/unicode/char/2163/index.htm
  [3]: http://www.markitdown.net/
  [4]: http://daringfireball.net/projects/markdown/basics
  [5]: http://daringfireball.net/projects/markdown/syntax
</textarea>
    </div>

    <div class="grid__col grid__col--4">
      <textarea class="js-output"></textarea>
    </div>
    <div class="grid__col grid__col--4">
      <iframe class="js-preview"></iframe>
    </div>

  </div>

</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.26.0/codemirror.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.26.0/mode/xml/xml.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.26.0/addon/edit/matchbrackets.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.6/marked.js'></script>
<script >'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// import 'CodeMirror/mode/xml/xml';
// import 'CodeMirror/addon/edit/matchbrackets';
// import CodeMirror from 'CodeMirror';
// import marked     from 'marked';

var App = function () {
  function App(options) {
    _classCallCheck(this, App);

    this.init();
    this.addEventListeners();
  }

  App.prototype.init = function init() {
    var input = this.input = CodeMirror.fromTextArea(document.querySelector('.js-input'), {
      lineNumbers: true,
      matchBrackets: true,
      mode: 'text/x-markdown',
      theme: 'material'
    });

    var output = this.output = CodeMirror.fromTextArea(document.querySelector('.js-output'), {
      lineNumbers: true,
      matchBrackets: true,
      mode: 'text/html',
      theme: 'material',
      readOnly: true
    });

    this.preview = document.querySelector('.js-preview');

    output.getWrapperElement().classList.add('CodeMirror-readonly');

    this.compile(input.getValue());
  };

  App.prototype.compile = function compile(source) {
    var previewDocument = this.preview.contentDocument;
    var output = marked(source);

    previewDocument.open();
    previewDocument.write(output);
    previewDocument.close();

    this.output.setValue(output);
  };

  App.prototype.addEventListeners = function addEventListeners() {
    var _this = this;

    var input = this.input;

    var delay = undefined;

    input.on('change', function () {
      clearTimeout(delay);
      delay = setTimeout(function () {
        return _this.compile(input.getValue());
      }, 300);
    });
  };

  return App;
}();

new App();
//# sourceURL=pen.js
</script>
</body></html>