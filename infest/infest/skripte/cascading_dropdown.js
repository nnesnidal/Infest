var subjectObject = {
    "DeathKnight": { "Tank": "0", "Blood DPS": "1", "Frost DPS": "2", "Unholy DPS": "3"},
    "Druid": { "Tank": "0", "Feral": "1", "Balance": "2", "Resto": "3"},
    "Hunter": { "MM": "0", "BM": "1", "Survival": "2"},
    "Mage": { "Fire": "0", "Arcane": "1", "Frost": "2"},
    "Paladin": { "Protection": "0", "Holy": "1", "Retribution": "2"},
    "Priest": { "Discipline": "0", "Holy": "1", "Shadow": "2"},
    "Rogue": { "Combat": "0", "Assassin": "1"},
    "Shaman": { "Resto": "0", "Elemental": "1", "Enhancement": "2"},
    "Warlock": { "Demonology": "0", "Affliction": "1"},
    "Warrior": { "Protection": "0", "Fury": "1", "Arms": "2"}
  }
  window.onload = function() {
    var classSel = document.getElementById("class");
    var msSel = document.getElementById("ms");
    var osSel = document.getElementById("os");
    classSel.options[0].style.backgroundColor = "#9c9b9a";
    msSel.options[0].style.backgroundColor = "#9c9b9a";
    osSel.options[0].style.backgroundColor = "#9c9b9a";
  
    for (var x in subjectObject) { //loop petlja, dropdown ["", "deathknight", "druid"]
      classSel.options[classSel.options.length] = new Option(x, x); //dropdown.selekcija[0] = "", dropdown.selekcija[2] = nova selekcija (druid, {})
      classSel.options[classSel.options.length-1].style.backgroundColor = "#9c9b9a"; //dropdown.selekcija[3-1].stiliziraj
      classSel.options[classSel.options.length-1].style.fontWeight = "bold";
      var class_value = classSel.options[classSel.options.length-1].value;
      var class_color = classSel.options[classSel.options.length-1];
      switch (class_value) {
        case 'DeathKnight':
          class_color.style.color = "#C41F3B";
          break;
        case 'Druid':
          class_color.style.color = "#FF7D0A";
          break;
        case 'Hunter':
          class_color.style.color = "#ABD473";
          break;
        case 'Mage':
          class_color.style.color = "#69CCF0";
          break;
        case 'Paladin':
          class_color.style.color = "#F58CBA";
          break;
        case 'Priest':
          class_color.style.color = "#fff";
          break;
        case 'Rogue':
          class_color.style.color = "#FFF569";
          break;
        case 'Shaman':
          class_color.style.color = "#0070DE";
          break;
        case 'Warlock':
          class_color.style.color = "#9482C9";
          break;
        case 'Warrior':
          class_color.style.color = "#C79C6E";
          break;
        default:
          class_color.style.color = "black";
      }
    }
    classSel.onchange = function() {
      //empty ms and os dropdowns
      msSel.length = 1;
      osSel.length = 1;
      //display correct values
      for (var y in subjectObject[this.value]) {
        msSel.options[msSel.options.length] = new Option(y, y);
        osSel.options[osSel.options.length] = new Option(y, y);
        msSel.options[msSel.options.length-1].style.backgroundColor = "#9c9b9a";
        osSel.options[osSel.options.length-1].style.backgroundColor = "#9c9b9a";
        msSel.options[msSel.options.length-1].style.fontWeight = "bold";
        osSel.options[osSel.options.length-1].style.fontWeight = "bold";
      }
    }
  }