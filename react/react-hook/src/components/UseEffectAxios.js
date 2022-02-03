import axios from "axios";
import React, { useState, useEffect } from "react";

export default function UseEffectAxios() {
  const [dataArray, setDataArray] = useState(null);
  useEffect(() => {
    axios.get("http://jsonplaceholder.typicode.com/posts").then((result) => {
      const { data } = result;
      console.log(data);
      // alert(JSON.stringify(result.data))
      setDataArray(data);
    });
  }, []);
  return (
    <div>
      {/* <p>#DEBUG{JSON.stringify(dataArray)}</p> */}
      <ul>{dataArray && dataArray.map((item) => <li key={item.id}>{item.id}: {item.title}</li>)}</ul>
    </div>
  );
}
