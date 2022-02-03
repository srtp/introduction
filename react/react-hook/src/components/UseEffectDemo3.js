import React from "react";

export default function UseEffectDemo3() {
  const [count, setCount] = React.useState(0);
  const doSomeThing = () => {
    setCount(previus=> previus + 1);
    console.log("Do Some Thing");
  };
  React.useEffect(() => {
    const intervalId = setInterval(doSomeThing, 1000);
    return () => {
        //Cleanup
      clearInterval(intervalId)
    };
  }, []);
  return (
    <div>
      <h3>{count}</h3>
    </div>
  );
}
