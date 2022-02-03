import React from "react";
import ThemeContext from "./ThemeContext";

export default function UseEffectContextChild() {
  const cc = React.useContext(ThemeContext);
  return (
    <div>
      <ThemeContext.Consumer>
        {(color) => <h1 style={{ color }}>Color is {color}</h1>}
      </ThemeContext.Consumer>

      <h2>{cc}</h2>
    </div>
  );
}
