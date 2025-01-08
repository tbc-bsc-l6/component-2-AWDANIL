using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using BOOSE;


namespace Component_1
{
    /// <summary>
    /// Represents a custom command to draw a rectangle on the canvas with optional fill.
    /// </summary>
    /// <seealso cref="BOOSE.Command" />
    public class CustomRect : Command
    {
        private readonly ICanvas _canvas;
        private int _width;
        private int _height;
        private bool _filled;


        /// <summary>
        /// Initializes a new instance of the <see cref="CustomRect"/> class with the specified canvas.
        /// </summary>
        /// <param name="canvas">The canvas where rectangle will be drawn.</param>
        public CustomRect(ICanvas canvas)
        {
            _canvas = canvas;
        }


        /// <summary>
        /// Sets the command with the specified program and parameter list.
        /// This method processes the parameters after calling the base implementation.
        /// </summary>
        /// <param name="program">The stored program to associate with the command.</param>
        /// <param name="parameterList">The parameter list for the command.</param>
        public override void Set(StoredProgram program, string parameterList)
        {
            base.Set(program, parameterList);
            ProcessParameters(parameterList);
        }

        /// <summary>
        /// Checks the parameters for Rect command.
        /// </summary>
        /// <param name="parameterList">The parameter list.</param>
        /// <exception cref="BOOSE.CommandException">
        /// Tri requires exactly two parameters: width and height.
        /// or
        /// Invalid parameters for Rect. Width and height must be integers.
        /// </exception>
        public override void CheckParameters(string[] parameterList)
        {
            if (parameterList.Length < 2 || parameterList.Length > 3)
            {
                throw new CommandException("Invalid number of parameters in Rect: rect <width>,<height>[,<filled>]");
            }
        }

        /// <summary>
        /// Processes the parameter list to extract the width, height, and fill status.
        /// </summary>
        /// <param name="parameterList">The parameter list as a comma-separated string.</param>

        private void ProcessParameters(string parameterList)
        {
            var parameters = parameterList.Split(',');

            _width = int.Parse(parameters[0]);
            _height = int.Parse(parameters[1]);

            if (parameters.Length == 3)
            {
                _filled = bool.Parse(parameters[2]);
            }
            else
            {
                _filled = false; // Default to not filled
            }
        }

        /// <summary>
        /// Executes this rect command.
        /// </summary>
        /// <exception cref="BOOSE.CanvasException">Canvas not initialized.</exception>
        public override void Execute()
        {
            if (_canvas == null)
            {
                throw new CanvasException("Canvas not initialized.");
            }


            _canvas.Rect(_width, _height, _filled);
        }
    }
}
