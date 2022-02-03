import React from "react";
import "./style.css"

export default function ex1_styles() {
  const styles = {
    container: { backgroundColor: "green", height: 200 },
  };
  return (
    <div >
      <div className="root">
        <h1>Inline Style CSS Exmple</h1>
      </div>
      <div style={styles.container}>
        <h1>Style CSS Exmple</h1>
      </div>
    </div>
  );
}
