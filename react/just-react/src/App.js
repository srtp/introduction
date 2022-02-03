import React, { useState } from "react";

export default function App() {
  const startNote = {
    content: "",
    author: "",
  };
  //State
  const [note, setNote] = useState(startNote);
  const [allNote, setAllNote] = useState([]);
  const [editNote, setEditNote] = useState(null);

  // funciton form input
  function onNoteValueChange(event) {
    const { name, value } = event.target;
    setNote((prevNote) => {
      return {
        ...prevNote,
        [name]: value,
      };
    });
  }

  function onEditValueChange(event) {
    const { name, value } = event.target;
    setEditNote((prevNote) => {
      return {
        ...prevNote,
        [name]: value,
      };
    });
  }
  //  function add,edit,delete
  function onNoteSubmit(event) {
    event.preventDefault();

    setAllNote((prevAllnote) => {
      const newNote = { ...note };
      newNote.id = Date.now().toString();
      return [newNote, ...prevAllnote];
    });
    setNote(startNote);
  }

  function onNoteDelete(noteId) {
    setAllNote((prevAllnote) => {
      return prevAllnote.filter((theNote) => theNote.id !== noteId);
    });
  }

  function onNoteEdit(event) {
    event.preventDefault();
    setAllNote((prevAllNote) => {
      return prevAllNote.map((theNote) => {
        if (theNote.id !== editNote.id) return theNote;
        return editNote;
      });
    });

    setEditNote(null);
  }

  //Element
  const noteElement = allNote.map((theNote) => {
    return (
      <div key={theNote.id} className="app-note">
        <p>{theNote.content}</p>
        <h5>{theNote.author}</h5>
        <p>
          <a
            onClick={() => {
              setEditNote(theNote);
            }}
          >
            EDIT
          </a>
          <span>|</span>
          <a
            onClick={() => {
              onNoteDelete(theNote.id);
            }}
          >
            DELETE
          </a>
        </p>
      </div>
    );
  });

  let editNoteElement = null;
  if (!!editNote) {
    editNoteElement = (
      <div className="app-edit-note">
        <form onSubmit={onNoteEdit}>
          <p>
            <textarea
              rows="3"
              type="text"
              placeholder="บันทึกความในใจ"
              name="content"
              value={editNote.content}
              onChange={onEditValueChange}
            />
          </p>
          <p>
            <input
              type="text"
              placeholder="เพื่อนบ้านที่แสนดี"
              name="author"
              value={editNote.author}
              onChange={onEditValueChange}
            />
          </p>
          <button type="submit">ADD</button>
        </form>
      </div>
    );
  }

  return (
    <section className="app-section" align="center">
      <div className="app-container">
        <h3>สักหน่อยมั้ยหละ</h3>
        <form onSubmit={onNoteSubmit}>
          <p>
            <textarea
              rows="3"
              type="text"
              placeholder="บันทึกความในใจ"
              name="content"
              value={note.content}
              onChange={onNoteValueChange}
            />
          </p>
          <p>
            <input
              type="text"
              placeholder="เพื่อนบ้านที่แสนดี"
              name="author"
              value={note.author}
              onChange={onNoteValueChange}
            />
          </p>
          <button type="submit">ADD</button>
        </form>
        <div className="app-notes">{noteElement}</div>
      </div>
      <div>{editNoteElement}</div>
    </section>
  );
}
