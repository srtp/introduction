// Original
const characters = [
    { name: 'ปูนิ่ม', range: 'melee' },
    { name: 'ช้างยิ้ม', range: 'range' },
    { name: 'เหนือฟ้า', range: 'melee' }
];


// Add
const newCharacter = { name: 'แสงเหนือ', range: 'range' };
const addedCharacters = [...characters, newCharacter];

console.log('--- Add ---')
console.log(characters);
console.log(addedCharacters);


// Edit
const editIndex = 1;
const newName = 'แสงเหนือ';
const editedCharacters = characters.map((character, index) => {
  if (index !== editIndex) {
    return character;
  }
  const editCharacter = { ...character };
  editCharacter.name = newName;
  return editCharacter;
});

console.log('\n--- Edit ---')
console.log(characters);
console.log(editedCharacters);


// Delete
const deleteIndex = 1;
const deletedCharacters = characters.filter((character, index) => {
    return index !== deleteIndex;
});

console.log('\n--- Delete ---')
console.log(characters);
console.log(deletedCharacters);


// Sort (มากไปน้อย)
let scores = [73, 53, 68, 80];
let sortedScores = [...scores].sort((score1, score2) => {
    if (score1 > score2) {
        return -1;
    }
    else if (score1 < score2) {
        return 1;
    }
    return 0;
});

console.log('\n--- Sort ---')
console.log(scores);
console.log(sortedScores);