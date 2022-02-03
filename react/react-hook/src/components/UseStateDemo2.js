import React,{useState} from "react";

export default function UseStateDemo2() {
    const intialState = {username:"",password:""}
    const [account, setAccount] = useState(intialState)
  return (
    <div>
      <h1>DEMO 2 : Object</h1>
        <p>#Debug {JSON.stringify(account)}</p>
      <form>
        <input type="text" value={account.username} placeholder="Username" onChange={event=>{
            setAccount({...account,username:event.target.value})
        }} />
        <br />
        <input type="text" placeholder="Password" value={account.password} onChange={event=>{
            setAccount({...account,password:event.target.value})
        }} />
        <br />
        <button
          onClick={(event) => {
            event.preventDefault();
            alert(JSON.stringify(account))
          }}
        >
          Submit
        </button>
        <button
          onClick={(event) => {
            event.preventDefault();
            setAccount(intialState)
          }}
        >
          Clear
        </button>
      </form>
    </div>
  );
}
