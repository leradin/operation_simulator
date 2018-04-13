    var fontCheckTimer = null,
        retries = 15,
        attempts = 0,
        refreshCount = 0,
        affiliations = ["F", "H", "U", "N"];
        battle_dimension = ["P", "A", "G", "S", "U"];

        function createSymbology() {
            try{
                var aff = document.getElementById('identity');
                var value_affiliation = aff.options[aff.selectedIndex].value;
                var batt = document.getElementById('battle_dimension');
                var value_battle_dimention = batt.options[batt.selectedIndex].value;
                var sta = document.getElementById('status');
                var value_status = sta.options[sta.selectedIndex].value;
                var value_modifier = "--";
                testRender(value_affiliation, value_battle_dimention, value_modifier, value_status);
            }catch(err){
                console.log(err);
            }
        }

        function testRender(affi, batt, modi, stat) {
            var msa = armyc2.c2sd.renderer.utilities.MilStdAttributes;
            var preview = document.getElementById("preview");

            var ctx = preview.getContext('2d');
            ctx.save();
            ctx.setTransform(1, 0, 0, 1, 0, 0);
            ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            ctx.restore();
            var modifiers = {};

            modifiers = populateModifiers();
            modifiers[msa.PixelSize] = 60;
            modifiers[msa.KeepUnitRatio] = true;
            modifiers[msa.SymbologyStandard] = 1;
            var ii = armyc2.c2sd.renderer.MilStdIconRenderer.Render("S" + affiliations[refreshCount] + "GDUSAT----***", modifiers);
            var showDrawAreas = false;
            if (showDrawAreas) {
                var imageBounds = ii.getImageBounds();
                ctx.strokeStyle = "#FF0000";
                imageBounds.stroke(ctx);
                var symbolBounds = ii.getSymbolBounds();
                ctx.strokeStyle = "#0000FF";
                symbolBounds.stroke(ctx);
            }

            ctx.drawImage(ii.getImage(), 0, 0);
            if (showDrawAreas) {
                var centerPoint = ii.getCenterPoint();
                ctx.strokeStyle = "#FF0000";
                ctx.fillStyle = "#FF0000";
                ctx.lineWidth = 3;
                centerPoint.stroke(ctx);
            }
            var iiTG = armyc2.c2sd.renderer.MilStdIconRenderer.Render("G" + affiliations[refreshCount] + "GPGPP---****X", modifiers);
            ctx.drawImage(iiTG.getImage(), Math.ceil(ii.getImageBounds().getWidth() + 10), 0);
            if (showDrawAreas) {
                ctx.lineWidth = 1;
                var imageBoundsTG = iiTG.getImageBounds();
                imageBoundsTG.shift(ii.getImageBounds().getWidth() + 10, 0);
                ctx.strokeStyle = "#FF0000";
                imageBoundsTG.stroke(ctx);

                var symbolBoundsTG = iiTG.getSymbolBounds();
                symbolBoundsTG.shift(ii.getImageBounds().getWidth() + 10, 0);
                ctx.strokeStyle = "#0000FF";
                symbolBoundsTG.stroke(ctx);

                var centerPointTG = iiTG.getCenterPoint();
                ctx.strokeStyle = "#FF0000";
                ctx.fillStyle = "#FF0000";
                ctx.lineWidth = 3;
                centerPointTG.shift(ii.getImageBounds().getWidth() + 10, 0);
                centerPointTG.stroke(ctx); //*/
            }

            //canvas border
            ctx.strokeStyle = "#000000";
            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.lineTo(650, 0);
            ctx.lineTo(650, 200);
            ctx.lineTo(0, 200);
            ctx.lineTo(0, 0);
            ctx.stroke(); //*/

            /*modifiers = new Object();
            modifiers[msa.PixelSize] = 60; 
            var iiTGMP = armyc2.c2sd.renderer.MilStdIconRenderer.Render("WA-DPFCU---L---", modifiers);
            ctx.drawImage(iiTGMP.getImage(), Math.ceil(ii.getImageBounds().getWidth() + iiTG.getImageBounds().getWidth() + 20), 0);
            if (showDrawAreas) {
                var symbolBoundsTGMP = iiTGMP.getSymbolBounds();
                symbolBoundsTGMP.shift(ii.getImageBounds().getWidth() + iiTG.getImageBounds().getWidth() + 20, 0);
                ctx.strokeStyle = "#0000FF";
                ctx.lineWidth = 1;
                symbolBoundsTGMP.stroke(ctx);
            }*/

            modifiers = new Object();
            modifiers[msa.PixelSize] = 60;
            ii = armyc2.c2sd.renderer.MilStdIconRenderer.Render("S" + affi + batt + stat + "------" + modi + "---", modifiers);
            var width = ii.getImageBounds().getWidth();
            var height = ii.getImageBounds().getHeight();
            var dataUri = ii.toDataUrl();
            saveImageSymbology(dataUri,"S" + affi + batt + stat + "------" + modi + "---");
            console.log("S" + affi + batt + stat + "------" + modi + "---");
            document.getElementById('sidc').value = "S" + affi + batt + stat + "------" + modi + "---", modifiers;
            var divSymbology = document.getElementById("divSymbology");
            var imgTxt = [];
            imgTxt.push('<image id="symbology"  class="img-responsive center-block" width="' + width + '" height="' + height + '" src="');
            imgTxt.push(dataUri);
            imgTxt.push('" />');
            divSymbology.innerHTML = imgTxt.join("");
            var imge = document.getElementById("divSymbology");
            imge.innerHTML = imgTxt.join("");
            refreshCount++;
            if (refreshCount > 3) {
                refreshCount = 0;
            }
        }

        function testRender2(sidc) {
          var msa = armyc2.c2sd.renderer.utilities.MilStdAttributes;
          var preview = document.getElementById("preview");
          var ctx = preview.getContext('2d');
          ctx.save();
          ctx.setTransform(1, 0, 0, 1, 0, 0);
          ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
          ctx.restore();
          //SET MODIFIERS/////////////////////////////////////////////////
          var modifiers = {};
          modifiers = populateModifiers();
          modifiers[msa.PixelSize] = 60;
          modifiers[msa.KeepUnitRatio] = true;
          modifiers[msa.SymbologyStandard] = 1;
          //CALL TO RENDER////////////////////////////////////////////////
          //render via Data Url
          modifiers = new Object();
          modifiers[msa.PixelSize] = 60;

          ii = armyc2.c2sd.renderer.MilStdIconRenderer.Render(sidc,modifiers);
          var width = ii.getImageBounds().getWidth();
          var height = ii.getImageBounds().getHeight();
          var dataUri = ii.toDataUrl();

          var imgTxt = [];
          imgTxt.push('<img class="img-responsive center-block" width="' + width + '" height="' + height + '" src="');
          imgTxt.push(dataUri);
          imgTxt.push('" />');

          refreshCount++;
          if (refreshCount > 3) {
              refreshCount = 0;
          }          
          return imgTxt[0]+imgTxt[1]+imgTxt[2];
      }

        function populateModifiers() {
            var modifiers = {};
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.C_QUANTITY] = 10;
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.H_ADDITIONAL_INFO_1] = "H";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.H1_ADDITIONAL_INFO_2] = "H1";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.H2_ADDITIONAL_INFO_3] = "H2";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.X_ALTITUDE_DEPTH] = "X"; //X
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.K_COMBAT_EFFECTIVENESS] = "K"; //K
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.Q_DIRECTION_OF_MOVEMENT] = "45"; //Q
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.W_DTG_1] = armyc2.c2sd.renderer.utilities.SymbolUtilities.getDateLabel(new Date()); //W
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.W1_DTG_2] = armyc2.c2sd.renderer.utilities.SymbolUtilities.getDateLabel(new Date()); //W1
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.J_EVALUATION_RATING] = "J";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.M_HIGHER_FORMATION] = "M";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.N_HOSTILE] = "ENY";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.P_IFF_SIF] = "P";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.Y_LOCATION] = "Y";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.C_QUANTITY] = "C";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.F_REINFORCED_REDUCED] = "RD";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.L_SIGNATURE_EQUIP] = "!";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.G_STAFF_COMMENTS] = "G";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.V_EQUIP_TYPE] = "V";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.T_UNIQUE_DESIGNATION_1] = "T";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.T1_UNIQUE_DESIGNATION_2] = "T1";
            modifiers[armyc2.c2sd.renderer.utilities.ModifiersUnits.Z_SPEED] = "999"; //Z
            return modifiers;
        }

        setTimeout(createSymbology(), 3000);