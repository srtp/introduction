import React from "react";
import { observer } from "mobx-react-lite";
import { store } from "./store/store";

const Test = observer(() => {
  return <div>{store.go()}</div>;
});

export default Test;
