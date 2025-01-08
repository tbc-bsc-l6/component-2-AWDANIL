using System;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using BOOSE;
using Component_1;

namespace Component1.Tests
{
    [TestClass]
    public class DrawingCommandTests
    {
        private Canvas _canvas;
        private StoredProgram _program;
        private Parser _parser;

        [TestInitialize]
        public void Setup()
        {
            // Initialize the BOOSE components
            _canvas = new Canvas();
            _program = new StoredProgram(_canvas);
            _parser = new Parser(new CommandFactory(), _program);
        }

        [TestMethod]
        public void TestMoveToCommand()
        {
            // Arrange
            string moveToScript = "moveto 50,100"; // Move the pen to (50, 100)

            // Act
            _parser.ParseProgram(moveToScript);
            _program.Run();

            // Assert
            Assert.AreEqual(50, _canvas.Xpos, "X position after MoveTo is incorrect.");
            Assert.AreEqual(100, _canvas.Ypos, "Y position after MoveTo is incorrect.");
        }

        [TestMethod]
        public void TestDrawToCommand()
        {
            // Arrange
            string drawToScript = "moveto 10,20\ndrawto 100,200"; // Move to (10, 20) and draw to (100, 200)

            // Act
            _parser.ParseProgram(drawToScript);
            _program.Run();

            // Assert
            Assert.AreEqual(100, _canvas.Xpos, "X position after DrawTo is incorrect.");
            Assert.AreEqual(200, _canvas.Ypos, "Y position after DrawTo is incorrect.");
        }


        [TestMethod]
        public void TestMultilineProgram()
        {
            // Arrange
            string multilineScript = @"
        moveto 10,20
        drawto 100,200
        rect 100,50
        pen 0,0,255
        tri 100,50
        rect 100,50,true
        write Hello!,World
        rect 50,25,false
        circle 50,true

    ";

            var canvas = new CanvasWrapper(500, 500); // Initialize canvas
            var program = new StoredProgram(canvas);
            var factory = new CustomCommandFactory(canvas);
            var parser = new Parser(factory, program);

            // Act
            parser.ParseProgram(multilineScript);
            program.Run();

            // Assert
            Assert.AreEqual(100, canvas.Xpos, "X position after multiline program is incorrect.");
            Assert.AreEqual(200, canvas.Ypos, "Y position after multiline program is incorrect.");
        }
    }
}


