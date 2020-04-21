var ScrabbleWordFinder = (() => {
  var ScrabbleWordFinder = function() {
    this.dict = new ScrabbleDictionary(ScrabbleWordList);
  };

  ScrabbleWordFinder.prototype.find = function(letters) {
    return validWords(this.dict.root, letters);
  };
  
  var LetterValue = {'a':1, 'b':3, 'c':3, 'd':2, 'e':1, 'f':4, 'g':2, 'h':4, 'i':1, 'j':8, 'k':5, 'l':1, 'm':3, 'n':1, 'o':1, 'p':3, 'q':10, 'r':1, 's':1, 't':1, 'u':1, 'v':4, 'w':4, 'x':8, 'y':4, 'z':10, '*':0};
  const LetterArray = Object.entries(LetterValue);

  var validWords = function(node, letters, word = '', results = [], deadLetter='') {
    if(node.isWord){
		var points = 0;
		var array = word.split('');
		for(var key in array) {
            var value = array[key];
            for (const [char, point] of LetterArray) {
              if(char == value){
                  points += point;
              }
            }
        }
        var data = {};
        data.word = word.toUpperCase();
        data.points = points;
        data.wordmeaning = '<a target="_blank" href="'+base_url+'word/'+word+'">Meaning: '+word.toUpperCase()+'</a>';
        results.push(Object.values(data));
    }
    var seen = new Set();
    if(letters.indexOf('*') > -1){
        var alphabet = "abcdefghijklmnopqrstuvwxyz".split("");
        _.each(alphabet, function(letter){
            var combo = letters.replace("*", letter);
            for (let ch of combo) {
              if (!seen.has(ch)) {
                seen.add(ch);
                if (node.children[ch]) {
                  let deadLetter = letter;
                  validWords(node.children[ch], combo.replace(ch, ''), word + ch, results, deadLetter);
                }
              }
            }
        });
    }else{
        for (let ch of letters) {
          if (!seen.has(ch)) {
            seen.add(ch);
            if (node.children[ch]) {
              validWords(node.children[ch], letters.replace(ch, ''), word + ch, results);
            }
          }
        }
    }
    return results;
  };

  var ScrabbleDictionary = function(words) {
    this.root = new ScrabbleTrieNode();
    words.forEach(word => this.insert(word));
  };

  var ScrabbleTrieNode = function() {
    this.children = Object.create(null);
  };

  ScrabbleDictionary.prototype.insert = function(word) {
    var cursor = this.root;
    for (let letter of word) {
      if (!cursor.children[letter]) {
        cursor.children[letter] = new ScrabbleTrieNode();
      }
      cursor = cursor.children[letter];
    }
    cursor.isWord = true;
  };

  return new ScrabbleWordFinder();
})();