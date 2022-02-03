import React from 'react'

export default function UseEffectDemo2() {

    const [count, setCount] = React.useState(0)
    React.useEffect(() => {
        //Called whenever state is changed
        document.title = "Current Count:"+ count
        
    }, [count])
    return (
        <div>
            <h1>UseEffect Demo1</h1>
            <h4>{count}</h4>
            <button onClick={()=>setCount(count+1)}>ADD</button>
        </div>
    )
}
