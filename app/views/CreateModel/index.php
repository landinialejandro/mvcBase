<?php require APP_ROOT . "/views/inc/header.php"; ?>
<style type="text/css">
    <!--
    .title {
        font-size: 14px;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        color: #0000FF;
        font-weight: bold;
    }

    .text {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 10px;
    }

    .style7 {
        font-weight: bold
    }

    .style8 {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 10px;
        font-weight: bold;
    }

    .style9 {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 10px;
        font-style: italic;
    }

    .style10 {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 10px;
        color: #FF0000;
        font-weight: bold;
    }
    -->
</style>
<form id="form1" name="form1" method="post" action="?convert">
    <table width="741" border="0" align="center">
        <tr>
            <td height="30" colspan="3" bgcolor="#EEEEEE" class="title">Convert: MySQL Table -&gt; php class</td>
        </tr>
        <tr>
            <td height="30" colspan="2" class="text">
                <div align="left"><strong>Connect settings </strong></div>
            </td>
            <td width="358" class="style10"><?php if (isset($error)) {
                                                echo $error;
                                            } ?></td>
        </tr>
        <tr>
            <td width="225" class="text">
                <div align="right"><span class="style7">Server Host </span></div>
            </td>
            <td width="144"><label>
                    <input name="textfield" type="text" value="localhost" />
                </label></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="text">
                <div align="right"><span class="style7">Username</span></div>
            </td>
            <td><label>
                    <input name="textfield2" type="text" value="root" />
                </label></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="text">
                <div align="right"><span class="style7">Password</span></div>
            </td>
            <td><label>
                    <input type="password" name="textfield3" />
                </label></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="text">
                <div align="right"><span class="style7">DataBase Name </span></div>
            </td>
            <td><label>
                    <input type="text" name="textfield4" />
                </label></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td height="30" colspan="2" class="style8">Function settings generating </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="style8">
                <div align="right">Construct</div>
            </td>
            <td colspan="2"><em>
                    <label>
                        <input name="checkbox" type="checkbox" value="true" checked="checked" />
                        <span class="text"> public function New_TableName(param){} </span></label>
                </em></td>
        </tr>
        <tr>
            <td class="style8">
                <div align="right">Load row from key </div>
            </td>
            <td colspan="2"><em>
                    <label>
                        <input name="checkbox2" type="checkbox" value="true" checked="checked" />
                        <span class="text"> public function Load_from_key($key){}</span></label>
                </em></td>
        </tr>
        <tr>
            <td class="style8">
                <div align="right">Delete row from key </div>
            </td>
            <td colspan="2"><em>
                    <input name="checkbox3" type="checkbox" value="true" checked="checked" />
                    <span class="text">public function Delete_row_from_key($key_row){}</span></em></td>
        </tr>
        <tr>
            <td class="style8">
                <div align="right">Save active row </div>
            </td>
            <td colspan="2"><em>
                    <label>
                        <input name="checkbox4" type="checkbox" value="true" checked="checked" />
                        <span class="text">public function Save_Active_Row(){}</span></label>
                </em></td>
        </tr>
        <tr>
            <td class="style8">
                <div align="right">Save active row as new </div>
            </td>
            <td colspan="2"><em>
                    <label>
                        <input name="checkbox5" type="checkbox" value="true" checked="checked" />
                        <span class="text">public function Save_Active_Row_as_New(){}</span></label>
                </em></td>
        </tr>
        <tr>
            <td class="style8">
                <div align="right">Get Order Keys </div>
            </td>
            <td colspan="2" class="text"><em>
                    <label>
                        <input name="checkbox6" type="checkbox" value="true" checked="checked" />
                        public function GetKeysOrderBy($column, $order){}</label>
                </em></td>
        </tr>
        <tr>
            <td class="style8">
                <div align="right">Getters</div>
            </td>
            <td colspan="2" class="text"><em>
                    <label>
                        <input name="checkbox7" type="checkbox" value="true" checked="checked" />
                        public function GetVar_name(){}</label>
                </em></td>
        </tr>
        <tr>
            <td class="style8">
                <div align="right">Setters</div>
            </td>
            <td colspan="2" class="style9"><label>
                    <input name="checkbox8" type="checkbox" value="true" checked="checked" />
                </label> <label>public function SetVar_name($new_content){}</label></td>
        </tr>
        <tr>
            <td class="style8">&nbsp;</td>
            <td>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </td>
            <td><input type="submit" name="Submit" value="Generate now" /></td>
        </tr>
    </table>
</form>
<form>
    <div class="field">
        <label class="label">Label</label>
        <div class="control">
            <input class="input" type="text" placeholder="Text input">
        </div>
        <p class="help">This is a help text</p>
    </div>
</form>

<?php require APP_ROOT . "/views/inc/footer.php"; ?>