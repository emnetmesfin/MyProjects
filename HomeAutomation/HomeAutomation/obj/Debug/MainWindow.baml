   M S B A M L   `   `   `  ����I  EHomeAutomation, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null/clr-namespace:HomeAutomationHomeAutomation  5   	       HomeAutomation.MainWindow   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   .localclr-namespace:HomeAutomation     5   	   V RMaterialDesignThemes.Wpf, Version=2.5.0.1205, Culture=neutral, PublicKeyToken=nullFmaterialDesign1http://materialdesigninxaml.net/winfx/xaml/themes  5
   
     � WindowStartupLocation$  CenterScreen=�5       � Title$ 
MainWindow��5   	   $	��600��6   $	��950��6)   
���   �   MaterialDesignBody#���   5      $��Regular"�5      $��13(�5      &   System.Windows.Media.TextOptions   TextFormattingMode$ Ideal=�5         TextRenderingMode$
 Auto=�5        MaterialDesignPaper#���  5        MaterialDesignFont#���  5       � 	Resources 5        MenuOpen �� TargetProperty �� 
TargetName9  3System.Windows.Media.Animation.EasingDoubleKeyFrame O� KeyTime O� Value  	MenuClose��%�  &	       &	 �     �� 5   
   .��5      U� $ (FrameworkElement.Width)�6,   $ GridMenu��6a   .\�5        $ 0��6'   $ 60Q�63     5      $ 0:0:0��6'   $	 200Q�67   5      5      �� 5   
   .��5      U� $ (FrameworkElement.Width)�6,   $ GridMenu��6a   .\�5        $ 0��6'   $	 200Q�63     5      $ 0:0:0��6'   $ 60Q�67   5      5      5       	 � Triggers	 5!      :� 5"   
   
 :� RoutedEvent$
 ButtonBase.Click��6    :� 
SourceName$ ButtonOpenMenu��66   .[�5#      �� #��[ 6   6G   5$      :� 5%   
   $
 ButtonBase.Click��6   $ ButtonCloseMenu��66   .[�5&      �� #��[ 6   6H   5'      .��5)      � 
�������.+�5*   
   � $��50��6   $	��Top=�6   
����+��.+�5,      �� $��Simple Home Automation��6   $��10q�66   $	��Top=�6B   $��Center=�6Z   $��25(�6w   5-      �� 5/      $��Center=�6    �� Orientation$ 
Horizontal=�64   $��Right=�6M   .+�51      '  !MaterialDesignThemes.Wpf.PopupBox  $	��10 q�6+      PlacementMode$ BottomAndAlignRightEdges=�68      	StaysOpen .    PopupContent. 52      �� $	��150��6!   .+�54      �� -   5         ��Name$ ButtonPopUpLogout��54   !   $��Logout��6<   6M   56      58      5:      5<      � 5?   
   -   5         �Name$ GridMenu��5?      $��60��6!   $
��Left=�6,   
����+��.+�5@      �� .+�5A      � $��50��6   
�������.+�5D      �� -   5        $ ButtonCloseMenu��5D      $��60��66   $	��100��6A   $	��Top=�6N   $y�	Collapsed=�6f   .��5E      '  !MaterialDesignThemes.Wpf.PackIcon  ���	#FF182393�  �ControlzEx.PackIconBase`1[[MaterialDesignThemes.Wpf.PackIconKind, MaterialDesignThemes.Wpf, Version=2.5.0.1205, Culture=neutral, PublicKeyToken=null]]   Kind$ 	ArrowLeft=�6I   $��25��6Z   $��25��6f   5F      �� 5G      -   5        $ ButtonOpenMenu��5G      $��60��66   
���i��$	��Top=�6[   $��0q�6�   .��5H        ���	#FF182393$
 Menu=�6I   $��40��6U   $��25��6a   $	��Top=�6l   $��	10,0,10,0q�6�   5I      5J      �� 5M      $��0,5,0,0q�6   .@�5O      �� -   5        
�������$��60��5O   6   .��5P      �� $ 
Horizontal=�6%   .+�5Q        $ Explore=�66   $��25��6E   $��25��6P   $��10q�6\   $��Center=�6h   �� 5R      $��DESCRIPTION��6(   $��Center=�6;   $��20 10q�6V   6g   5S      5U      �� 5V      -   5        
�������$��60��5V   6   .��5W      �� $ 
Horizontal=�6%   .+�5X        $ ViewDashboardVariant=�66   $��25��6R   $��25��6]   $��10q�6i   $��Center=�6u   �� 5Y      $��WEATHER��6(   $��Center=�67   $��20 10q�6R   6c   5Z      5\      �� 5]      -   5        
�������$��60��5]   6   .��5^      �� $ 
Horizontal=�6%   .+�5_        $ TemperatureCelsius=�66   $��25��6P   $��25��6[   $��10q�6h   $��Center=�6t    J� RenderTransformOrigin$ 0.528,-4.144&�6�   �� 5`      $��TEMPERATURE��6(   $��Center=�6;   $��20 10q�6V   6g   5a      5c      �� 5d      -   5        
�������$��60��5d   6   .��5e      �� $ 
Horizontal=�6%   .+�5f        $ Speak=�66   $��25��6C   $��25��6N   $��10q�6[   $��Center=�6g   �� 5g      $��SPEECH��6(   $��Center=�66   $��20 10q�6Q   6b   5h      5j      �� 5k      -	   5        
�������$��60��5k   6   .��5l      �� $ 
Horizontal=�6%   .+�5m        $ LightbulbOn=�66   $��25��6I   $��25��6T   $��10q�6a   $��Center=�6m   �� 5n      $��LIGHT CONTROL��6(   $��Center=�6=   $��20 10q�6X   6i   5o      5q      �� 5r      -
   5        
�������$��60��5r   6   .��5s      �� $ 
Horizontal=�6%   .+�5t        $
 Show=�66   $��25��6B   $��25��6M   $��10q�6Z   $��Center=�6f   �� 5u      $��DISPLAY CONTROL��6(   $��Center=�6?   $��20 10q�6Z   6k   5v      5x      5{      5}      5      � 5�   
   -   5        $ workingSpace��5�      $��	60,53,0,0q�6&   5�      5�      5�      