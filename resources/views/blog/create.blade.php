@extends('layouts.main')

@section('content')
<div class= "section">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Blog add page</h3></div>

                <div class="card-body">
{{--                    <form method="POST" action="{{ route('blog.store') }}">--}}
                        {!! Form::open(['files' => true, 'route' => 'blog.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

                        {{--@csrf--}}

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Title</label>

                            <div class="col-md-10">
                                <input id="" type="text" class="form-control" name="title" required autofocus>                          
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Description</label>

                            <div class="col-md-10">
                                <textarea id="summernote" type="text" class="form-control" name="body" style="height: 200px" required ></textarea>                          
                            </div>
                            <div class="container">
                            <div class="col-md-10">
                            <input type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" >
                            </div>
</div>
                        </div>                                  
                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-2 pull-right">



                                <input type='file' name="image" onchange="readURL(this);" />
                                <br>
                                <img id="blah" src="http://placehold.it/180" style="width: 180px;height: 180px" alt="your image" />
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                    {{--</form>--}}



                            </div>
                        </div>
                        {!! Form::close() !!}
                    {{--</form>--}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@push('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
    
makeOptionItemFunction(self.options, 'itemValue');
makeOptionItemFunction(self.options, 'itemText');
makeOptionFunction(self.options, 'tagClass');

// Typeahead Bootstrap version 2.3.2
if (self.options.typeahead) {
  var typeahead = self.options.typeahead || {};

  makeOptionFunction(typeahead, 'source');

  self.$input.typeahead($.extend({}, typeahead, {
    source: function (query, process) {
      function processItems(items) {
        var texts = [];

        for (var i = 0; i < items.length; i++) {
          var text = self.options.itemText(items[i]);
          map[text] = items[i];
          texts.push(text);
        }
        process(texts);
      }

      this.map = {};
      var map = this.map,
          data = typeahead.source(query);

      if ($.isFunction(data.success)) {
        // support for Angular callbacks
        data.success(processItems);
      } else if ($.isFunction(data.then)) {
        // support for Angular promises
        data.then(processItems);
      } else {
        // support for functions and jquery promises
        $.when(data)
         .then(processItems);
      }
    },
    updater: function (text) {
      self.add(this.map[text]);
      return this.map[text];
    },
    matcher: function (text) {
      return (text.toLowerCase().indexOf(this.query.trim().toLowerCase()) !== -1);
    },
    sorter: function (texts) {
      return texts.sort();
    },
    highlighter: function (text) {
      var regex = new RegExp( '(' + this.query + ')', 'gi' );
      return text.replace( regex, "<strong>$1</strong>" );
    }
  }));
}

// typeahead.js
if (self.options.typeaheadjs) {
    var typeaheadConfig = null;
    var typeaheadDatasets = {};

    // Determine if main configurations were passed or simply a dataset
    var typeaheadjs = self.options.typeaheadjs;
    if ($.isArray(typeaheadjs)) {
      typeaheadConfig = typeaheadjs[0];
      typeaheadDatasets = typeaheadjs[1];
    } else {
      typeaheadDatasets = typeaheadjs;
    }

    self.$input.typeahead(typeaheadConfig, typeaheadDatasets).on('typeahead:selected', $.proxy(function (obj, datum) {
      if (typeaheadDatasets.valueKey)
        self.add(datum[typeaheadDatasets.valueKey]);
      else
        self.add(datum);
      self.$input.typeahead('val', '');
    }, self));
}

self.$container.on('click', $.proxy(function(event) {
  if (! self.$element.attr('disabled')) {
    self.$input.removeAttr('disabled');
  }
  self.$input.focus();
}, self));

  if (self.options.addOnBlur && self.options.freeInput) {
    self.$input.on('focusout', $.proxy(function(event) {
        // HACK: only process on focusout when no typeahead opened, to
        //       avoid adding the typeahead text as tag
        if ($('.typeahead, .twitter-typeahead', self.$container).length === 0) {
          self.add(self.$input.val());
          self.$input.val('');
        }
    }, self));
  }


self.$container.on('keydown', 'input', $.proxy(function(event) {
  var $input = $(event.target),
      $inputWrapper = self.findInputWrapper();

  if (self.$element.attr('disabled')) {
    self.$input.attr('disabled', 'disabled');
    return;
  }

  switch (event.which) {
    // BACKSPACE
    case 8:
      if (doGetCaretPosition($input[0]) === 0) {
        var prev = $inputWrapper.prev();
        if (prev.length) {
          self.remove(prev.data('item'));
        }
      }
      break;

    // DELETE
    case 46:
      if (doGetCaretPosition($input[0]) === 0) {
        var next = $inputWrapper.next();
        if (next.length) {
          self.remove(next.data('item'));
        }
      }
      break;

    // LEFT ARROW
    case 37:
      // Try to move the input before the previous tag
      var $prevTag = $inputWrapper.prev();
      if ($input.val().length === 0 && $prevTag[0]) {
        $prevTag.before($inputWrapper);
        $input.focus();
      }
      break;
    // RIGHT ARROW
    case 39:
      // Try to move the input after the next tag
      var $nextTag = $inputWrapper.next();
      if ($input.val().length === 0 && $nextTag[0]) {
        $nextTag.after($inputWrapper);
        $input.focus();
      }
      break;
   default:
       // ignore
   }

  // Reset internal input's size
  var textLength = $input.val().length,
      wordSpace = Math.ceil(textLength / 5),
      size = textLength + wordSpace + 1;
  $input.attr('size', Math.max(this.inputSize, $input.val().length));
}, self));

self.$container.on('keypress', 'input', $.proxy(function(event) {
   var $input = $(event.target);

   if (self.$element.attr('disabled')) {
      self.$input.attr('disabled', 'disabled');
      return;
   }

   var text = $input.val(),
   maxLengthReached = self.options.maxChars && text.length >= self.options.maxChars;
   if (self.options.freeInput && (keyCombinationInList(event, self.options.confirmKeys) || maxLengthReached)) {
      // Only attempt to add a tag if there is data in the field
      if (text.length !== 0) {
         self.add(maxLengthReached ? text.substr(0, self.options.maxChars) : text);
         $input.val('');
      }

      // If the field is empty, let the event triggered fire as usual
      if (self.options.cancelConfirmKeysOnEmpty === false) {
         event.preventDefault();
      }
   }

   // Reset internal input's size
   var textLength = $input.val().length,
      wordSpace = Math.ceil(textLength / 5),
      size = textLength + wordSpace + 1;
   $input.attr('size', Math.max(this.inputSize, $input.val().length));
}, self));

// Remove icon clicked
self.$container.on('click', '[data-role=remove]', $.proxy(function(event) {
  if (self.$element.attr('disabled')) {
    return;
  }
  self.remove($(event.target).closest('.tag').data('item'));
}, self));

// Only add existing value as tags when using strings as tags
if (self.options.itemValue === defaultOptions.itemValue) {
  if (self.$element[0].tagName === 'INPUT') {
      self.add(self.$element.val());
  } else {
    $('option', self.$element).each(function() {
      self.add($(this).attr('value'), true);
    });
  }
}
},

/**
* Removes all tagsinput behaviour and unregsiter all event handlers
*/
destroy: function() {
var self = this;

// Unbind events
self.$container.off('keypress', 'input');
self.$container.off('click', '[role=remove]');

self.$container.remove();
self.$element.removeData('tagsinput');
self.$element.show();
},

/**
* Sets focus on the tagsinput
*/
focus: function() {
this.$input.focus();
},

/**
* Returns the internal input element
*/
input: function() {
return this.$input;
},

/**
* Returns the element which is wrapped around the internal input. This
* is normally the $container, but typeahead.js moves the $input element.
*/
findInputWrapper: function() {
var elt = this.$input[0],
    container = this.$container[0];
while(elt && elt.parentNode !== container)
  elt = elt.parentNode;

return $(elt);
}
};

/**
* Register JQuery plugin
*/
$.fn.tagsinput = function(arg1, arg2, arg3) {
var results = [];

this.each(function() {
var tagsinput = $(this).data('tagsinput');
// Initialize a new tags input
if (!tagsinput) {
    tagsinput = new TagsInput(this, arg1);
    $(this).data('tagsinput', tagsinput);
    results.push(tagsinput);

    if (this.tagName === 'SELECT') {
        $('option', $(this)).attr('selected', 'selected');
    }

    // Init tags from $(this).val()
    $(this).val($(this).val());
} else if (!arg1 && !arg2) {
    // tagsinput already exists
    // no function, trying to init
    results.push(tagsinput);
} else if(tagsinput[arg1] !== undefined) {
    // Invoke function on existing tags input
      if(tagsinput[arg1].length === 3 && arg3 !== undefined){
         var retVal = tagsinput[arg1](arg2, null, arg3);
      }else{
         var retVal = tagsinput[arg1](arg2);
      }
    if (retVal !== undefined)
        results.push(retVal);
}
});

if ( typeof arg1 == 'string') {
// Return the results from the invoked function calls
return results.length > 1 ? results : results[0];
} else {
return results;
}
};

$.fn.tagsinput.Constructor = TagsInput;

/**
* Most options support both a string or number as well as a function as
* option value. This function makes sure that the option with the given
* key in the given options is wrapped in a function
*/
function makeOptionItemFunction(options, key) {
if (typeof options[key] !== 'function') {
var propertyName = options[key];
options[key] = function(item) { return item[propertyName]; };
}
}
function makeOptionFunction(options, key) {
if (typeof options[key] !== 'function') {
var value = options[key];
options[key] = function() { return value; };
}
}
/**
* HtmlEncodes the given value
*/
var htmlEncodeContainer = $('<div />');
function htmlEncode(value) {
if (value) {
return htmlEncodeContainer.text(value).html();
} else {
return '';
}
}

/**
* Returns the position of the caret in the given input field
* http://flightschool.acylt.com/devnotes/caret-position-woes/
*/
function doGetCaretPosition(oField) {
var iCaretPos = 0;
if (document.selection) {
oField.focus ();
var oSel = document.selection.createRange();
oSel.moveStart ('character', -oField.value.length);
iCaretPos = oSel.text.length;
} else if (oField.selectionStart || oField.selectionStart == '0') {
iCaretPos = oField.selectionStart;
}
return (iCaretPos);
}

/**
* Returns boolean indicates whether user has pressed an expected key combination.
* @param object keyPressEvent: JavaScript event object, refer
*     http://www.w3.org/TR/2003/WD-DOM-Level-3-Events-20030331/ecma-script-binding.html
* @param object lookupList: expected key combinations, as in:
*     [13, {which: 188, shiftKey: true}]
*/
function keyCombinationInList(keyPressEvent, lookupList) {
var found = false;
$.each(lookupList, function (index, keyCombination) {
    if (typeof (keyCombination) === 'number' && keyPressEvent.which === keyCombination) {
        found = true;
        return false;
    }

    if (keyPressEvent.which === keyCombination.which) {
        var alt = !keyCombination.hasOwnProperty('altKey') || keyPressEvent.altKey === keyCombination.altKey,
            shift = !keyCombination.hasOwnProperty('shiftKey') || keyPressEvent.shiftKey === keyCombination.shiftKey,
            ctrl = !keyCombination.hasOwnProperty('ctrlKey') || keyPressEvent.ctrlKey === keyCombination.ctrlKey;
        if (alt && shift && ctrl) {
            found = true;
            return false;
        }
    }
});

return found;
}

/**
* Initialize tagsinput behaviour on inputs and selects which have
* data-role=tagsinput
*/
$(function() {
$("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
});
})(window.jQuery);

</script>

@endpush
