$(function(){
var dict = {
"А": "A",
"а": "a",
"Б": "B",
"б": "b",
"В": "V",
"в": "v",
"Г": "G",
"г": "g",
"Д": "D",
"д": "d",
"Е": "Ye",
"е": "ye",
"Ё": "Yo",
"ё": "yo",
"Ж": "Zh",
"ж": "zh",
"З": "Z",
"з": "z",
"И": "I",
"и": "i",
"Й": "J",
"й": "j",
"К": "K",
"к": "k",
"Л": "L",
"л": "l",
"М": "M",
"м": "m",
"Н": "N",
"н": "n",
"О": "O",
"о": "o",
"П": "P",
"п": "p",
"Р": "R",
"р": "r",
"С": "S",
"с": "s",
"Т": "T",
"т": "t",
"У": "U",
"у": "u",
"Ф": "F",
"ф": "f",
"Х": "Kg",
"х": "kh",
"Ц": "C",
"ц": "c",
"Ч": "Ch",
"ч": "ch",
"Ш": "Sh",
"ш": "sh",
"щ": "sch",
"Щ": "Sch",
"Ъ": "'",
"ъ": "'",
"Ы": "Y",
"ы": "y",
"Ь": "\"",
"ь": "\"",
"Э": "E",
"э": "e",
"Ю": "Yu",
"ю": "yu",
"Я": "Ya",
"я": "ya"
};

var keys = [];
for (i in dict) { if (dict.hasOwnProperty(i)) { keys.push(i); } }
var keys_joined = keys.join('|');

var can_xlit = function(text) {
  return !!text.match(keys_joined);
};

var xlit = function(text) {
  keys.forEach(function(k) {
    text = text.replace(new RegExp(k, "g"), dict[k]);
  });
  return text;
};

var init_xlit = function() {
  var post = this;

  if (can_xlit($(post).find('.body').html())) {
    var xlb = $("<a href='#'>Б -> B</a>").click(function(e) {
      $(post).find('.body').html(
        xlit($(post).find('.body').html())
      );
      $(this).remove();
      e.preventDefault();
    });
    $(post).find('.post_no').last().after(xlb);
  }
}

	$('div.post').each(init_xlit);

        // allow to work with auto-reload.js, etc.
        $(document).on('new_post', function(e, post) {
		if ($(post).is('div.post')) {
			init_xlit.call(post);
		}
		else {
	                $(post).find('div.post').each(init_xlit);
		}
        });

});
