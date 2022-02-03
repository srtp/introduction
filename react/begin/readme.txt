vscode extension
1. vscode-icon
2. es7/react/...
3. html to jsx
4. color highlight
5. path intellisense
6. matching tag 
7. prettier 



# Edit Emmet Auto-Suggestion Problem (Add in setup JSON)
"emmet.syntaxProfiles": {
    "javascript": "jsx"
},
"emmet.includeLanguages": {
    "javascript": "javascriptreact"
},
"emmet.triggerExpansionOnTab": true,



#variables
- let counter1
- const counter2
- state in class this.state={counter3:0}
- state in functional const [count4, setCount4] = useState(0)
- props

https://reactjs.org/docs/typechecking-with-proptypes.html