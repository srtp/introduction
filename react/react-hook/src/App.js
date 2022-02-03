import React, { useMemo } from "react";
import UseEffectDemo2 from "./components/UseEffectDemo2";
import UseEffectDemo from "./components/UseEffectDemo";
import UseStateDemo1 from "./components/UseStateDemo1";
import UseStateDemo2 from "./components/UseStateDemo2";
import UseStateDemo3 from "./components/UseStateDemo3";
import UseEffectDemo3 from "./components/UseEffectDemo3";
import UseEffectAxios from "./components/UseEffectAxios";
import UseEffectContext from "./components/UseEffectContext";
import UseMemo from "./components/UseMemo";

export default function App() {
  const [isShow, setIsShow] = React.useState(true)
  return (
   <div style={{ textAlign: "center" }}>
     {/* <UseStateDemo1/>
     <UseStateDemo2/>
     <UseStateDemo3/> */}
     {/* <UseEffectDemo/> */}
    {/* {isShow &&<UseEffectDemo2/>}
    <button onClick={()=>setIsShow(false)}>Hide</button> */}
    {/* <UseEffectDemo3/> */}
    <UseEffectAxios/>
    {/* <UseEffectContext/> */}
    {/* <UseMemo/> */}
   </div>
  );
}
