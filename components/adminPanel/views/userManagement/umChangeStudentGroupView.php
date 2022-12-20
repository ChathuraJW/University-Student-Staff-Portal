<style>
    .infoSection {
        padding-left: 50px;
    }

    .studentGroupTable {
        text-align: center;
        padding: 10px;
        width: fit-content;
    }
</style>
<div class="changeStudentGroupIndividual">
    <span class="sectionTitle">Change Student Group</span>
    <div class="row">

        <div class="row col-2" id="groupEditSection">
            <div>
                <form method="post" action="#groupEditSection">
                    <span class="inputHeading">Student group</span>
                    <select name='studentGroup' id='studentGroup' required>
                        <optgroup label='1st Year Student'>
                            <option value='1CS1'>1CS1</option>
                            <option value='1CS2'>1CS2</option>
                            <option value='1IS'>1IS</option>
                        </optgroup>
                        <optgroup label='2nd Year Student'>
                            <option value='2CS1'>2CS1</option>
                            <option value='2CS2'>2CS2</option>
                            <option value='2IS'>2IS</option>
                        </optgroup>
                        <optgroup label='3rd Year Student'>
                            <option value='3CSG'>3CSG</option>
                            <option value='3CSS'>3CSS</option>
                            <option value='3CSC'>3CSC</option>
                            <option value='3ISG'>3ISG</option>
                            <option value='3IS'>3IS</option>
                        </optgroup>
                        <optgroup label='4th Year Student'>
                            <option value='4CSS'>4CSS</option>
                            <option value='4CSE'>4CSE</option>
                            <option value='4IS'>4IS</option>
                        </optgroup>
                    </select>
                    <br><br>
                    <span class="inputHeading">Student index number list</span>
                    <textarea name="studentIndexList" id="" cols="30" rows="20" style="width:100%"></textarea>

                    <div style='padding-top: 40px;'>
                        <input type='submit' value='Change Group' name='updateStudentGroup' class='button'
                               onclick='confirmMessage(`Are you sure to save changes?`)'>
                        <input type='reset' value='Cancel' name='cancel' class='button'>
                    </div>
                </form>
            </div>
            <div class="infoSection">
                <!--                group detail list load hear-->
                <span class='inputHeading'>Group Details</span>
                <div class="studentGroupTable">
                    <table>
                        <tr>
                            <th>Group code</th>
                            <th>Description</th>
                        </tr>
                        <!--                1 st year-->
                        <tr>
                            <td>1CS1</td>
                            <td>1<sup>st</sup> Year Computer Science Group 1</td>
                        </tr>
                        <tr>
                            <td>1CS2</td>
                            <td>1<sup>st</sup> Year Computer Science Group 2</td>
                        </tr>
                        <tr>
                            <td>1IS</td>
                            <td>1<sup>st</sup> Year Information Systems</td>
                        </tr>

                        <!--                2 nd year-->
                        <tr>
                            <td>2CS1</td>
                            <td>2<sup>nd</sup> Year Computer Science Group 1</td>
                        </tr>
                        <tr>
                            <td>2CS2</td>
                            <td>2<sup>nd</sup> Year Computer Science Group 2</td>
                        </tr>
                        <tr>
                            <td>2IS</td>
                            <td>2<sup>nd</sup> Year Information Systems</td>
                        </tr>

                        <!--                3 rd year-->
                        <tr>
                            <td>3CSG</td>
                            <td>3<sup>rd</sup> Year Computer Science General</td>
                        </tr>
                        <tr>
                            <td>3CSS</td>
                            <td>3<sup>rd</sup> Year Software Engineering Special</td>
                        </tr>
                        <tr>
                            <td>3CSC</td>
                            <td>3<sup>rd</sup> Year Computer Science Special</td>
                        </tr>
                        <tr>
                            <td>3ISG</td>
                            <td>3<sup>rd</sup> Year Information Systems General</td>
                        </tr>
                        <tr>
                            <td>3IS</td>
                            <td>3<sup>rd</sup> Year Information Systems Special</td>
                        </tr>

                        <!--                4 th year-->
                        <tr>
                            <td>4CSS</td>
                            <td>4<sup>th</sup> Year Software Engineering Special</td>
                        </tr>
                        <tr>
                            <td>4CSC</td>
                            <td>4<sup>th</sup> Year Computer Science Special</td>
                        </tr>
                        <tr>
                            <td>4IS</td>
                            <td>4<sup>th</sup> Year Information Systems Special</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>