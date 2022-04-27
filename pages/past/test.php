<SCRIPT type="text/javascript" language="JavaScript">
    function SortSelect(strSelect, blnAtoZ){
        if(blnAtoZ == null){blnAtoZ = true}
        objSelect = document.getElementById(strSelect)
        for (i = 1; i < objSelect.length; i++) {
            strInsert = objSelect.options[i].text;
            for (j = 0; j <= i; j++ ) {
                strCurrent = objSelect.options[j].text;
                if (((blnAtoZ && strInsert <= strCurrent) || (!blnAtoZ && strInsert >= strCurrent)) && (i != j) ) {
                    objInsert = objSelect.options[i];
                    objWalk = objSelect.options[j];
                    objSelect.insertBefore(objInsert, objWalk);
                    j = i;
                }
            }
        }
    }
</SCRIPT>
<SELECT id="slcMenu" multiple style="width:50px;">
    <OPTION>あ
        ・・・
    <OPTION>ん
</SELECT>
<input type="button" value="Sort A to Z" onClick="SortSelect(slcMenu,true)">
<input type="button" value="Sort Z to A" onClick="SortSelect(slcMenu,false)">
