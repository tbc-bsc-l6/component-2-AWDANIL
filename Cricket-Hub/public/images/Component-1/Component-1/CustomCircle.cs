using BOOSE;

public class CustomCircle : Command
{
    private readonly ICanvas _canvas;
    private int _radius;
    private bool _filled;
    private StoredProgram _program;

    /// <summary>
    /// Initializes a new instance of the <see cref="CustomCircle"/> class.
    /// </summary>
    /// <param name="canvas">The canvas where the circle will be drawn.</param>
    public CustomCircle(ICanvas canvas)
    {
        _canvas = canvas;
    }

    /// <summary>
    /// Sets the circle command with the specified parameters.
    /// </summary>
    /// <param name="program">The stored program to associate with the command.</param>
    /// <param name="parameters">The parameter string containing radius and optionally filled.</param>
    public override void Set(StoredProgram program, string parameters)
    {
        base.Set(program, parameters);
        _program = program; // Store reference to the StoredProgram

        // Trim spaces and split the parameters
        var parameterList = parameters.Trim().Split(',').Select(p => p.Trim()).ToArray();

        // Validate and parse parameters
        CheckParameters(parameterList);

        _radius = ResolveValue(parameterList[0]); // Resolve radius (variable or literal)

        if (parameterList.Length > 1)
        {
            _filled = bool.Parse(parameterList[1]); // Optional filled parameter
        }
        else
        {
            _filled = false; // Default to unfilled
        }
    }

    /// <summary>
    /// Validates the parameters for the circle command.
    /// </summary>
    /// <param name="parameterList">An array of parameters to validate.</param>
    /// <exception cref="CommandException">Thrown for invalid parameters.</exception>
    public override void CheckParameters(string[] parameterList)
    {
        if (parameterList.Length < 1 || parameterList.Length > 2)
        {
            throw new CommandException("Invalid parameters for circle command. Expected: radius [,filled]");
        }

        // Validate that the radius parameter can be resolved
        if (!IsValueResolvable(parameterList[0]))
        {
            throw new CommandException($"Invalid radius value: '{parameterList[0]}'. Radius must be a positive integer or a valid variable.");
        }

        // Validate filled (if provided)
        if (parameterList.Length == 2 && !bool.TryParse(parameterList[1], out _))
        {
            throw new CommandException($"Invalid filled value: '{parameterList[1]}'. Must be 'true' or 'false'.");
        }
    }

    /// <summary>
    /// Executes the circle command by drawing a circle on the canvas.
    /// </summary>
    /// <exception cref="CanvasException">Thrown if the canvas is not initialized.</exception>
    public override void Execute()
    {
        if (_canvas == null)
        {
            throw new CanvasException("Canvas is not initialized.");
        }

        _canvas.Circle(_radius, _filled);
    }

    /// <summary>
    /// Resolves a value from the given parameter, either directly or from a variable.
    /// </summary>
    /// <param name="parameter">The parameter to resolve.</param>
    /// <returns>The resolved integer value.</returns>
    private int ResolveValue(string parameter)
    {
        // Check if the parameter is a variable
        if (_program.VariableExists(parameter))
        {
            string value = _program.GetVarValue(parameter);
            if (int.TryParse(value, out int resolvedValue))
            {
                return resolvedValue;
            }

            throw new CommandException($"Invalid variable value for '{parameter}': {value}");
        }

        // If it's not a variable, parse it directly as an integer
        if (int.TryParse(parameter, out int literalValue))
        {
            return literalValue;
        }

        throw new CommandException($"Invalid parameter value: '{parameter}'. Must be a positive integer or a valid variable.");
    }

    /// <summary>
    /// Checks if a parameter can be resolved to a value (literal or variable).
    /// </summary>
    /// <param name="parameter">The parameter to check.</param>
    /// <returns>True if resolvable; otherwise, false.</returns>
    private bool IsValueResolvable(string parameter)
    {
        return _program.VariableExists(parameter) || int.TryParse(parameter, out _);
    }
}
