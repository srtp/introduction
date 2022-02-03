import './Appsearch.css'

function Appsearch(props){
    const {value,onValueChange} = props
    return(
        <div className="app-search">
          <input className="input-search" 
          type="text" 
          placeholder='ซักหน่อยมั้ยหล่ะ' 
          value={value}
          onChange={(event)=>{onValueChange(event.target.value)}}
          
          />
        </div>
    )
}

export default Appsearch;