   M S B A M L   `   `   `  ����I  EHomeAutomation, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null/clr-namespace:HomeAutomationHomeAutomation  5      '    !HomeAutomation.Temperature_sensor   5      \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5      R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5      Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5      @d2http://schemas.microsoft.com/expression/blend/2008     5      .localclr-namespace:HomeAutomation     5      V RMaterialDesignThemes.Wpf, Version=2.5.0.1205, Culture=neutral, PublicKeyToken=nullFmaterialDesign1http://materialdesigninxaml.net/winfx/xaml/themes  5
      $	��550��5      $	��900��6      MaterialDesignBody#���   5      $��Regular"�5      $��13(�5      &   System.Windows.Media.TextOptions    TextFormattingMode$  Ideal=�5         TextRenderingMode$
 Auto=�5        MaterialDesignFont#���  5      .��5      � .+�5   
   �� $��Control panel��6   $��165,31,490,320.4q�6*   .��5      ��  �� Orientation$ 
Horizontal=�6   $��	0,0,0,1.2q�62   .+�5      �� -   5        $��15,20,20,32.6q�5      $
��Auto��60   $��86��6>   .��5      �� $��80��6   $��86��6'   ��5      �� 5       �� 	UriSource$ images/connect_button.png?�6*   5      5      �� 5      -   5        $��10,20,0,33.6q�5      $
��Auto��6/   $��86��6>   .��5      �� $��79��6   $��88��6'   ��5       �� 5!      $" images/disconnect_button.png?�6*   5#      5$      5,      5-      �� 5/   
   $��Temperature Monitor��6   $��445,30,74,315.4q�60   .��50      �� $ 
Horizontal=�6   .+�52      �� $��89��6   $��	0,2,0,0.6q�6#   ��53      �� 54      $ images/temp.png?�6&   56      �� 5;      -   5         ��Name$ 	tempWrite��5;       �� TextAlignment$ Center=�6/   
����ح�$	��249��6]   $��20(�6i   $��25,10,10,86.6q�6w   5<      5>      �� 5@   
   -   5        $ 	humWrite2��5@      $ Center=�6'   
����ح�$	��249��6U   $��20(�6a   $��565,160,86,333.4q�6o    J� RenderTransformOrigin$ 0.593,-0.587&�6�   �� 5C   
   -   5        $��connectionStatus��5C      $��166,269,502,240.4q�6,   $ Center=�6G   
����ح�6^   �� 5E   
   $%��Connect To Arduino Serial (COM)��6   $��169,330,96,100q�6<   .��5F      �� $ 
Horizontal=�6   $��Center=�62   .+�5G      �� $��Type in COM port��6   $��20(�64   $��	100,0,0,0q�6B   �� 5I      -   5        $��	portWrite��5I      $��50,0,0,0q�6+   $	��100��6=   $
��COM5��6I   5J      5K      5M      5N      