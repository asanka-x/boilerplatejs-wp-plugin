echo off
set CURRENTDIR=%CD%
del /s /q %CURRENTDIR%\plugin\hattland
del /s /q %CURRENTDIR%\plugin-build.zip
 
mkdir %CURRENTDIR%\plugin\hattland\libs
mkdir %CURRENTDIR%\plugin\hattland\src
mkdir %CURRENTDIR%\plugin\hattland\server

xcopy /s /e %CURRENTDIR%\libs %CURRENTDIR%\plugin\hattland\libs
xcopy /s /e %CURRENTDIR%\src %CURRENTDIR%\plugin\hattland\src
xcopy /s /e %CURRENTDIR%\server %CURRENTDIR%\plugin\hattland\server
7za -r a %CURRENTDIR%\plugin-build.zip %CURRENTDIR%\plugin\*.*