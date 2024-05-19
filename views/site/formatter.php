<?php
  /* $formatter = \Yii::$app->formatter;
   // output: January 1, 2016
   echo $formatter->asDate('2016-01-01', 'long'),"<br>";
   // output: 51.50%
   echo $formatter->asPercent(0.515, 2),"<br>";
   // output: <a href = "mailto:test@test.com">test@test.com</a>
   echo $formatter->asEmail('test@test.com'),"<br>";
   // output: Yes
   echo $formatter->asBoolean(true),"<br>";
   // output: (Not set)
   echo $formatter->asDate(null),"<br>";*/
   
   
   //exp2
   /*$formatter = \Yii::$app->formatter;
   echo $formatter->asDate(date('Y-m-d'), 'long'),"<br>";
   echo $formatter->asTime(date("Y-m-d")),"<br>";
   echo $formatter->asDatetime(date("Y-m-d")),"<br>";

   echo $formatter->asTimestamp(date("Y-m-d")),"<br>";
   echo $formatter->asRelativeTime(date("Y-m-d")),"<br>";?>*/

//exp3
   /*$formatter = \Yii::$app->formatter;
   echo $formatter->asDate(date('Y-m-d'), 'short'),"<br>";
   echo $formatter->asDate(date('Y-m-d'), 'medium'),"<br>";
   echo $formatter->asDate(date('Y-m-d'), 'long'),"<br>";
   echo $formatter->asDate(date('Y-m-d'), 'full'),"<br>";*/

   $formatter = \Yii::$app->formatter;
   echo Yii::$app->formatter->asInteger(105),"<br>";
   echo Yii::$app->formatter->asDecimal(105.41),"<br>";
   echo Yii::$app->formatter->asPercent(0.51),"<br>";
   echo Yii::$app->formatter->asScientific(105),"<br>";
   echo Yii::$app->formatter->asCurrency(105, "$"),"<br>";
   echo Yii::$app->formatter->asSize(105),"<br>";
   echo Yii::$app->formatter->asShortSize(105),"<br>";

?>