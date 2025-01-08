using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using BOOSE;

namespace Component_1
{
    /// <summary>
    /// Represent a command to draw a triangle on the canvas.
    /// </summary>
    /// <seealso cref="BOOSE.CanvasCommand" />
    /// <seealso cref="BOOSE.ICommand" />
    public class Tri : CanvasCommand, ICommand
    {
        private int _width;
        private int _height;

        /// <summary>
        /// Initializes a new instance of the <see cref="Tri"/> class.
        /// </summary>
        /// <param name="canvas">The canvas where the ttriangle will be drawn.</param>
        public Tri(ICanvas canvas) : base(canvas)
        {
        }

        /// <summary>
        /// Checks the parameters for Tri command.
        /// </summary>
        /// <param name="parameterList">The parameter list.</param>
        /// <exception cref="BOOSE.CommandException">
        /// Tri requires exactly two parameters: width and height.
        /// or
        /// Invalid parameters for Tri. Width and height must be integers.
        /// </exception>
        public override void CheckParameters(string[] parameterList)
        {
            if (parameterList.Length != 2)
            {
                throw new CommandException("Tri requires exactly two parameters: width and height.");
            }

            if (!int.TryParse(parameterList[0], out _) || !int.TryParse(parameterList[1], out _))
            {
                throw new CommandException("Invalid parameters for Tri. Width and height must be integers.");
            }
        }


        /// <summary>
        /// Compiles the command by processing its parameters.
        /// </summary>

        public override void Compile()
        {
            base.Compile();

            // Ensure two parameters (width and height) are provided
            CheckParameters(Parameters);

            // Parse the parameters
            _width = int.Parse(Parameters[0]);
            _height = int.Parse(Parameters[1]);
        }

        /// <summary>
        /// Executes the Tri command to draw a triangle on the canvas.
        /// </summary>
        /// <exception cref="BOOSE.CanvasException">Canvas not initialized</exception>
        public override void Execute()
        {
            base.Execute();

            // Call the Tri method on the canvas
            Canvas.Tri(_width, _height);
        }
    }
}
